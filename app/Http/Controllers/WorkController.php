<?php

namespace App\Http\Controllers;

use App\Http\Requests\AddImageToWorkRequest;
use App\Http\Requests\ChangeWorkImageRequest;
use App\Http\Requests\StoreTeamRequest;
use App\Models\Work;
use App\Models\WorkImage;
use Illuminate\Http\Request;

class WorkController extends Controller
{
    public function store(StoreTeamRequest $request){
        if($work = Work::create($request->all())){
            return response([
                'status' => 'success',
                'message' => 'Work successfully uploaded',
                'data' => $work
            ], 200);
        } else {
            return response([
                'status' => 'failed',
                'message' => 'Work not successfully uploaded'
            ], 500);
        }
    }

    public function update(StoreTeamRequest $request, $id){
        if(!empty($work = Work::find($id))){
            $all = $request->all();
            if($work->update($all)){
                return response([
                    'status' => 'success',
                    'message' => 'Work successfully updated',
                    'data' => $work
                ], 200);
            } else {
                return response([
                    'status' => 'failed',
                    'message' => 'Work Update Failed'
                ], 500);
            }
        } else {
            return response([
                'status' => 'failed',
                'message' => 'No Work was fetched'
            ], 404);
        }
    }

    public function add_file(AddImageToWorkRequest $request){
        $all = $request->only(['work_id']);
        $upload_image = FileController::uploadFile($request->file, 'work');
        if($upload_image){
            $all['filename'] = 'img/work/'.$upload_image;

            if($image = WorkImage::create($all)){
                return response([
                    'status' => 'success',
                    'message' => 'Work Image successfully Uploaded',
                    'data' => $image
                ], 200);
            } else {
                return response([
                    'status' => 'failed',
                    'message' => 'Could not upload Work Image'
                ], 500);
            }
        } else {
            return response([
                'status' => 'failed',
                'message' => 'Image Upload Failed'
            ], 500);
        }
    }

    public function change_file(ChangeWorkImageRequest $request, $id){
        $image = WorkImage::find($id);
        if(!empty($image)){
            $uploaded_image = FileController::uploadFile($request->file, 'work');
            if($uploaded_image){
                $old_path = $image->filename;

                $image->filename = 'img/work/'.$uploaded_image;
                $image->save();

                FileController::delete_file($old_path);

                return response([
                    'status' => 'success',
                    'message' => 'Work Image changed successfully',
                    'data' => $image
                ], 200);
            } else {
                return response([
                    'status' => 'failed',
                    'message' => 'Could not upload File'
                ], 500);
            }
        } else {
            return response([
                'status' => 'failed',
                'message' => 'No Work Image was fetched'
            ], 404);
        }
    }

    public function destroy_file($id){
        $image = WorkImage::find($id);
        if(!empty($image)){
            $image->delete();

            FileController::delete_file($image->filename);

            return response([
                'status' => 'failed',
                'message' => 'Image successfully deleted',
                'data' => $image
            ], 200);
        } else {
            return response([
                'status' => 'failed',
                'message' => 'No Image was fetched'
            ], 404);
        }
    }

    public function destroy($id){
        if(!empty($work = Work::find($id))){
            $work->delete();

            $images = WorkImage::where('work_id', $work->id);
            if($images->count() > 0){
                foreach($images->get() as $image){
                    $image->delete();

                    FileController::delete_file($image->filename);
                }
            }

            return response([
                'status' => 'success',
                'message' => 'Work deleted successfully'
            ], 200);
        } else {
            return response([
                'status' => 'failed',
                'message' => 'No Work was fetched'
            ], 404);
        }
    }
}
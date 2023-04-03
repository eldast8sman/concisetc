<?php

namespace App\Http\Controllers;

use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use App\Http\Requests\StoreServiceRequest;

class ServiceController extends Controller
{
    public function store(StoreServiceRequest $request){
        $all = $request->except(['file']);
        if(!empty($request->file)){
            if($upload_image = FileController::uploadFile($request->file, 'service')){
                $all['filename'] = 'img/service/'.$upload_image;
            }
        }
        if($service = Service::create($all)){
            return response([
                'status' => 'success',
                'message' => 'Service added successfully',
                'data' => $service
            ], 200);
        } else {
            return response([
                'status' => 'failed',
                'message' => 'Service was not successfully added'
            ], 500);
        }
    }

    public function update(StoreServiceRequest $request, $id){
        $service = Service::find($id);
        if(!empty($service)){
            $all = $request->except(['file']);
            $old_path = "";
            if(!empty($request->file)){
                if($request->file instanceof UploadedFile){
                    $uploaded_image = FileController::uploadFile($request->file, 'service');
                    $all['filename'] = 'img/service/'.$uploaded_image;
                    if(!empty($service->filename)){
                        $old_path = $service->filename;
                    }
                }
            }

            if($service->update($all)){
                if(!empty($old_path)){
                    FileController::delete_file($old_path);
                }

                return response([
                    'status' => 'success',
                    'message' => 'Service updated successfully',
                    'data' => $service
                ], 200);
            } else {
                return response([
                    'status' => 'failed',
                    'message' => 'Service update failed'
                ], 500);
            }
        } else {
            return response([
                'status' => 'failed',
                'message' => 'No Service was fetched'
            ], 404);
        }
    }

    public function destroy($id){
        if(!empty($service = Service::find($id))){
            $service->delete();
            if(!empty($service->filename)){
                FileController::delete_file($service->filename);
            }

            return response([
                'status' => 'success',
                'message' => 'Service successfully deleted',
                'data' => $service
            ], 200);
        } else {
            return response([
                'status' => 'failed',
                'message' => 'No Service was fetched'
            ], 404);
        }
    }
}

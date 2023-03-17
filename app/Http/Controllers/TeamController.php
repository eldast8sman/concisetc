<?php

namespace App\Http\Controllers;

use App\Models\Team;
use Illuminate\Http\Request;
use App\Http\Requests\StoreTeamRequest;
use App\Http\Requests\UpdateTeamRequest;
use Illuminate\Http\UploadedFile;

class TeamController extends Controller
{
    public function store(StoreTeamRequest $request){
        $all = $request->except(['file']);
        $upload_image = FileController::uploadFile($request->file, 'team');
        if($upload_image){
            $all['filename'] = 'img/team/'.$upload_image;
        }
        if($team = Team::create($all)){
            return response([
                'status' => 'success',
                'message' => 'Team Member added successfully',
                'data' => $team
            ], 200);
        } else {
            return response([
                'status' => 'failed',
                'message' => 'Team member was not successfully added'
            ], 500);
        }
    }

    public function update(UpdateTeamRequest $request, $id){
        $team = Team::find($id);
        if(!empty($team)){
            $all = $request->except(['file']);
            $old_path = "";
            if(!empty($request->file)){
                if($request->file instanceof UploadedFile){
                    $uploaded_image = FileController::uploadFile($request->file, 'team');
                    $all['filename'] = 'img/team/'.$uploaded_image;
                    if(!empty($team->filename)){
                        $old_path = $team->filename;
                    }
                }
            }
            if($team->update($all)){
                if(!empty($old_path)){
                    FileController::delete_file($old_path);
                }

                return response([
                    'status' => 'success',
                    'message' => 'Team Member updated successfully',
                    'data' => $team
                ], 200);
            } else {
                return response([
                    'status' => 'failed',
                    'message' => 'Team Member Update Failed'
                ], 500);
            }
        } else {
            return response([
                'status' => 'failed',
                'message' => 'No Team Member was fetched'
            ], 404);
        }
    }

    public function destroy($id){
        $team = Team::find($id);
        if(!empty($team)){
            $team->delete();
            if(!empty($team->filename)){
                FileController::delete_file($team->filename);
            }
            return response([
                'status' => 'success',
                'message' => 'Team Member deleted successfully',
                'data' => $team
            ], 200);
        } else {
            return response([
                'status' => 'failed',
                'message' => 'No Team Member was fetched'
            ], 404);
        }
    }
}

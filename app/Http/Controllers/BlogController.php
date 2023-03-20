<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use App\Http\Requests\StoreBlogRequest;
use App\Http\Requests\UpdateBlogRequest;

class BlogController extends Controller
{
    public function store(StoreBlogRequest $request){
        $all = $request->except(['file']);
        if($upload_image = FileController::uploadFile($request->file, 'blog')){
            $all['filename'] = 'img/blog/'.$upload_image;
        }
        if($blog = Blog::create($all)){
            return response([
                'status' => 'success',
                'message' => 'Blog added successfully',
                'data' => $blog
            ], 200);
        } else {
            return response([
                'status' => 'failed',
                'message' => 'Blog was not successfully added'
            ], 500);
        }
    }

    public function update(UpdateBlogRequest $request, $id){
        $blog = Blog::find($id);
        if(!empty($blog)){
            $all = $request->except(['file']);
            $old_path = "";
            if(!empty($request->file)){
                if($request->file instanceof UploadedFile){
                    $uploaded_image = FileController::uploadFile($request->file, 'blog');
                    $all['filename'] = 'img/blog/'.$uploaded_image;
                    if(!empty($blog->filename)){
                        $old_path = $blog->filename;
                    }
                }
            }

            if($blog->update($all)){
                if(!empty($old_path)){
                    FileController::delete_file($old_path);
                }

                return response([
                    'status' => 'success',
                    'message' => 'Blog updated successfully',
                    'data' => $blog
                ], 200);
            } else {
                return response([
                    'status' => 'failed',
                    'message' => 'Blog update failed'
                ], 500);
            }
        } else {
            return response([
                'status' => 'failed',
                'message' => 'No Blog was fetched'
            ], 404);
        }
    }

    public function destroy($id){
        if(!empty($blog = Blog::find($id))){
            $blog->delete();
            if(!empty($blog->filename)){
                FileController::delete_file($blog->filename);
            }

            return response([
                'status' => 'success',
                'message' => 'Blog successfully deleted',
                'data' => $blog
            ], 200);
        } else {
            return response([
                'status' => 'failed',
                'message' => 'No Blog was fetched'
            ], 404);
        }
    }
}

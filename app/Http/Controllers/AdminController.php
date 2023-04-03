<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Team;
use App\Models\Work;
use App\Models\Service;
use App\Models\WorkImage;
use App\Models\Testimonial;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index(){
        $teams = Team::orderBy('created_at', 'asc')->get();
        foreach($teams as $team){
            $team->filename = url($team->filename);
        }
        
        $testimonials = Testimonial::orderBy('created_at', 'desc')->get();
        foreach($testimonials as $testimonial){
            $testimonial->filename = url($testimonial->filename);
        }
        return view('admin.index', [
            'teams' => $teams,
            'testimonials' => $testimonials
        ]);
    }

    public function login(){
        return view('admin.login');
    }

    public function blogs(){
        $blogs = Blog::orderBy('created_at', 'desc')->paginate(30);
        foreach($blogs as $blog){
            $blog->filename = url($blog->filename);
            $blog->publication_date = date("F d Y", strtotime($blog->publication_date));
        }

        return view('admin.blogs', [
            'blogs' => $blogs
        ]);
    }

    public function blog($slug){
        $blog = Blog::where('slug', $slug)->first();
        $blog->filename = url($blog->filename);
        $blog->publication_date = date("F d Y", strtotime($blog->publication_date));

        return view('admin.blog', [
            'blog' => $blog
        ]);
    }

    public function projects(){
        $projects = Work::orderBy('created_at', 'desc')->paginate(30);
        foreach($projects as $project){
            $image = WorkImage::where('work_id', $project->id)->first();
            if(!empty($image)){
                $project->filename = url($image->filename);
            } else {
                $project->filename = "";
            }
        }

        return view('admin.works', [
            'projects' => $projects
        ]);
    }

    public function project($slug){
        $project = Work::where('slug', $slug)->first();
        $images = WorkImage::where('work_id', $project->id)->get();
        foreach($images as $image){
            $image->filename = url($image->filename);
        }
        $project->images = $images;

        return view('admin.work', [
            'project' => $project
        ]);
    }

    public function services(){
        $services = Service::orderBy('id', 'asc')->get();
        foreach($services as $service){
            if(!empty($service->filename)){
                $service->filename = url($service->filename);
            }
        }

        return view('admin.services', [
            'services' => $services
        ]);
    }

    public function service($slug){
        $service = Service::where('slug', $slug)->first();
        if(!empty($service->filename)){
            $service->filename = url($service->filename);
        }

        return view('admin.service', [
            'service' => $service
        ]);
    }
}

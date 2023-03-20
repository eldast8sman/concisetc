<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Team;
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
}

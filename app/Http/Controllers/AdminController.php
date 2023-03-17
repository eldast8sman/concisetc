<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Team;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index(){
        $teams = Team::orderBy('created_at', 'asc')->get();
        foreach($teams as $team){
            $team->filename = url($team->filename);
        }
        return view('admin.index', [
            'teams' => $teams
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

<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Team;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function index(){
        return view('index');
    }

    public function about(){
        $teams = Team::orderBy('created_at', 'asc')->get();
        foreach($teams as $team){
            $team->filename = url($team->filename);
        }
        return view('about', [
            'teams' => $teams
        ]);
    }

    public function blogs(){
        $today = date('Y-m-d');
        $first_blog = Blog::where('publication_date', '<=', $today)->orderBy('publication_date', 'desc')->first();
        if(!empty($first_blog)){
            $first_blog->filename = url($first_blog->filename);
            $first_blog->publication_date = date("F d Y", strtotime($first_blog->publication_date));
        }

        $blogs = Blog::where('publication_date', '<=', $today)->orderBy('publication_date', 'desc')->skip(1)->limit(2)->get();
        foreach($blogs as $blog){
            $blog->filename = url($blog->filename);
            $blog->publication_date = date("F d Y", strtotime($blog->publication_date));
        }

        return view('blogs', [
            'first_blog' => $first_blog,
            'blogs' => $blogs
        ]);
    }

    public function blog($slug){
        $blog = Blog::where('slug', $slug)->first();
        $blog->filename = url($blog->filename);
        $blog->publication_date = date("F d Y", strtotime($blog->publication_date));

        $blogs = Blog::where('id', '<>', $blog->id)->inRandomOrder()->take(3)->get();
        foreach($blogs as $oblog){
            $oblog->filename = url($oblog->filename);
            $oblog->publication_date = date("F d Y", strtotime($oblog->publication_date));
        }

        return view('blog', [
            'blog' => $blog,
            'blogs' => $blogs 
        ]);
    }
}

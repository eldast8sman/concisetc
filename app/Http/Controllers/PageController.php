<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Team;
use App\Models\Work;
use App\Models\Service;
use App\Models\WorkImage;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function index(){
        $services = Service::orderBy('id', 'asc')->get();
        foreach($services as $service){
            if(strpos(strtolower($service->title), "logistic") !== false){
                $service->icon = 'imgs/services/bus.svg';
            } elseif(strpos(strtolower($service->title), "school") !== false){
                $service->icon = 'imgs/services/utility.svg';
            } elseif(strpos(strtolower($service->title), "software") !== false){
                $service->icon = 'imgs/services/code.svg';
            } elseif(strpos(strtolower($service->title), "website") !== false){
                $service->icon = 'imgs/services/code.svg';
            } else {
                $service->icon = 'imgs/services/hammer.svg';
            }
        }
        return view('index', [
            'services' => $services,
        ]);
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

        $blogs = Blog::where('publication_date', '<=', $today)->orderBy('publication_date', 'desc')->skip(1)->limit(9)->get();
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

    public function contact(){
        return view('contact');
    }

    public function projects(){
        $sort = !empty($_GET['filter']) ? (string)$_GET['filter'] : "";
        if(!empty($sort)){
            $projects = [];

            $works = Work::orderBy('created_at', 'desc')->get();
            foreach($works as $work){
                $tags = explode(',', $work->tags);
                foreach($tags as $tag){
                    $tag = trim($tag);
                }

                if(in_array($sort, $tags)){
                    $projects[] = $work;
                }
            }

            $projects = self::paginate_array($projects);

        } else {
            $projects = Work::orderBy('created_at', 'desc')->paginate(10);
            foreach($projects as $project){
                $image = WorkImage::where('work_id', $project->id)->first();
                if(!empty($image)){
                    $project->filename = url($image->filename);
                } else {
                    $project->filename = "";
                }
            }
        }

        $filters = [];
        $all = Work::all();
        foreach($all as $single){
            $links = explode(',', $single->tags);
            foreach($links as $link){
                $link = trim($link);

                if(!in_array($link, $filters)){
                    $filters[] = $link;
                }
            }
        }

        return view('projects', [
            'projects' => $projects,
            'filters' => $filters
        ]);
    }

    public function project($slug){
        $project = Work::where('slug', $slug)->first();

        $images = WorkImage::where('work_id', $project->id)->get();
        foreach($images as $image){
            $image->filename = url($image->filename);
        }

        return view('project', [
            'project' => $project,
            'images' => $images
        ]);
    }

    public function service($slug){
        $service = Service::where('slug', $slug)->first();

        return view('service', [
            'service' => $service
        ]);
    }
}

<?php

namespace App\Http\Controllers;

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
}

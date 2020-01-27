<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Project;
use App\Problem;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
      $project = Project::with('sosialisasi.comment.user')->with('sosialisasi.like')->orderBy('created_at','DESC')->get();
      $problem = Problem::all();
        return view('home',['project'=>$project,'problem'=>$problem]);
    }
}

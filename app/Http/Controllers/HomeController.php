<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Project;
use App\Problem;
use Auth;
use Illuminate\Support\Facades\Hash;

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

    public function profile(){

      return view('profile');
    }

    function update_profile(Request $request){

      $user = User::find(Auth::user()->id);
      $user->name = $request->name;
      $user->posisi = $request->posisi;
      $user->save();

      return redirect()->back();
    }

    function update_password(Request $request){
      $user = User::find(Auth::user()->id);
      $password_old = Hash::check($request->old_password, $user->password);
      if($password_old){
        $user->password = Hash::make($request->password);
        $user->save();

        return redirect()->back();
      }else {
        return redirect()->back()->withErrors(['old_password' => 'Password Lama Tidak Cocok']);
      }
    }
}

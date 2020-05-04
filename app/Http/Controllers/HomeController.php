<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Project;
use App\Problem;
use Auth;
use Illuminate\Support\Facades\Hash;
use App\Sosialisasi;
use DB;
use App\SosialisasiImage;
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
      $sosialisasi = Sosialisasi::orderBy('created_at','DESC')->get();
      $mostlike= DB::table('sosialisasi')->join('likes','likes.sosialisasi_id','=','sosialisasi.id')
      ->select(DB::raw('count(likes.id) as mostlike,likes.id'),'sosialisasi.judul')
      ->groupBy('sosialisasi.judul','likes.id')
      ->limit(5)
      ->get();
      $mostcomment= DB::table('sosialisasi')->join('comments','comments.sosialisasi_id','=','sosialisasi.id')
      ->select(DB::raw('count(comments.id) as mostcomment,comments.id'),'sosialisasi.judul')
      ->groupBy('sosialisasi.judul','comments.id')
      ->limit(5)
      ->get();
      $bestuser= User::withCount('projects','problem')->limit(5)->orderBy('projects_count','DESC')->get();


        return view('home',['project'=>$project,'problem'=>$problem,'sosialisasis'=>$sosialisasi,'mostlike'=>$mostlike,'mostcomment'=>$mostcomment,'bestuser'=>$bestuser]);
    }

    public function profile(){

      return view('profile');
    }
    public function post(Request $request)
    {

      $sosialisasi =  new Sosialisasi;
      $sosialisasi->judul = $request->judul;
      $sosialisasi->post = $request->post;
      $sosialisasi->lokasi = $request->location;
      $sosialisasi->tanggal_event = $request->tanggal_event;
      $sosialisasi->user_id = Auth::user()->id;
      $sosialisasi->save();
      if (count($request->file) !== 0 ) {
        for ($i=0; $i <count($request->file) ; $i++) {
          // code...
          $imagesos = new SosialisasiImage;
          $filename = 'post-'.time() . '.' . $request->file[$i]->getClientOriginalExtension();
          $request->file[$i]->move(public_path('file/doc'), $filename);
          $imagesos->image = $filename;
          $imagesos->sosialisasi_id = $sosialisasi->id;
          $imagesos->save();
          echo $i;
        }

      }
      return redirect()->back();
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

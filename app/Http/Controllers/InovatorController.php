<?php
namespace App\Http\Controllers;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;
use App\User;
use App\Problem;
use App\ProblemInterest;
use App\Project;
use App\Member;
use App\Unit;
use Illuminate\Support\Facades\Auth;
use App\Notifications\Notification;

class InovatorController extends BaseController
{
    function index(){
      $inovator = User::withCount('problem','projects')->get();

      return view('inovator.index', compact('inovator'));
    }

    function myproblemlist(){
      // mengambil data dari table problem berdasarkan auth username
  	  $data_problem = Problem::with('interests')->where('user_id' , '=', Auth::user()->id)->orderBy('created_at','desc')->get();
      $user = User::find(Auth::user()->id);
      // $user->unreadNotifications->markAsRead();
      // mengirim data problem ke view my problem list
      return view('problem.myproblemlist',['data_problem' => $data_problem]);
    }

    function problempool(){
      // mengambil data dari table problem
      $problem_pool = Problem::with('user', 'interests', 'units')->orderBy('created_at','desc')->get();

      // mengirim data problem ke view my problempool
      return view('problem.problempool',['problem_pool' => $problem_pool]);
    }

    function problempoolInterest(Request $request, $id){
        // mengambil data dari table problem
        $interest = new ProblemInterest;
        $interest->problem_id = $id;
        $interest->user_id = Auth::user()->id;
        $interest->reason = $request->reason;
        $interest->save();

        // mengirim data problem ke view my problempool
        return redirect()->route('problem.problemdetail', $id);
    }
    //MENAMPILKAN PROBLEM DETAIL
    function problemdetail($problem_id){
        // mengambil data dari table problem sesuai ID
        $data_problem_detail = Problem::with('interests.user', 'units')->find($problem_id);

        // mengirim data problem ke view problem detail
        return view('problem.problemdetail', compact('data_problem_detail'));
    }

    // method untuk insert data ke table problem
    public function submitproblem(Request $request)
    {
        $problem = new Problem;
        $problem->user_id =  Auth::user()->id;
        $problem->unit_id = $request->unit_id;
        $problem->problem =  "Bagaimana $request->bagaimana dari $request->dari menjadi $request->menjadi di $request->di dalam waktu $request->periode?";
        $problem->background =  $request->background;
        $problem->asal_masalah =  implode(',',$request->food);
        $problem->status = '1';
        $problem->save();
        // alihkan halaman ke halaman index
        return redirect()->route('problem.myproblemlist')->with(['success' => 'Problem has been successfully submitted!']);
    }
    // DELETE MY PROBLEM
    // method untuk hapus data problem
    public function deleteproblem($problem_id)
    {
        // menghapus data problem berdasarkan problem_id yang dipilih
        Problem::find($problem_id)->delete();

        // alihkan halaman ke halaman my problem list
        return redirect('/problem/myproblemlist')->with('success', 'Problem has been successfully deleted');
    }
    // EDIT PROBLEM
    // method untuk edit data problem
    public function editproblem($problem_id)
    {
        // mengambil data problem berdasarkan problem_id yang dipilih
        $problem = Problem::find($problem_id);

        // passing data pegproblem yang didapat ke view editproblem
        return view('problem.editproblem',['problem' => $problem]);
    }
    // EDIT data problem
    public function editproblemaction(Request $request)
    {
        // update data pegawai
        $problem = Problem::find($request->problem_id);
        $problem->problem = $request->problem;
        $problem->asal_masalah = $request->asal_masalah;
        $problem->background = $request->background;
        $problem->tags = $request->tags;
        $problem->save();

        // alihkan halaman ke halaman problem detail
        return redirect()->route('problem.problemdetail', $request->problem_id)->with('success', 'Problem has been successfully edited');
    }

    // EDIT data problem
    public function interestoproject(Request $request, $id)
    {
        $problem = Problem::find($request->problem_id);
        $project = Project::where('problem_id', $request->problem_id)->first();

        if(!$project){
          $project = new Project;
          $project->problem_id = $request->problem_id;
          $project->project_name = $request->project_name;
          $project->project_owner = $problem->user_id;
          $project->project_status = 'Idea Generation';
          $project->save();

          $problem->status = '2';
          $problem->save();

          $member = new Member;
          $member->user_id = Auth::user()->id;
          $member->role = 'Owner';
          $member->project_id = $project->project_id;
          $member->save();
        }

        $member = new Member;
        $member->user_id = $id;
        $member->role = $request->role;
        $member->project_id = $project->project_id;
        $member->save();

        // alihkan halaman ke halaman problem detail
        return redirect()->route('project.projectmanagement', $project->project_id)->with('success', 'Project has been successfully added and include User');
    }
}

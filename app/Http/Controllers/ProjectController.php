<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Project;
use Auth;
use App\Unit;
use App\Member;
use DB;
use App\Paingain;
use App\Userjourney;
use App\Goldencircle;
use App\Summary;
use App\ProductDevelopment;
use App\PilotProject;
use App\DasarImplementasi;
use App\Sosialisasi;
use App\Impact;
use App\Problem;
class ProjectController extends Controller
{
    public function myproject()
    {
      $project = Project::all();
      $user = User::all();
      $unit = Unit::all();
      $problem = Problem::all();
      return view('project.myproject',['users'=>$user,'projects'=>$project,'unit'=>$unit,'problem'=>$problem]);
    }
    function myprojectstore(Request $request){

      $project = new Project;
      $project->project_name = $request->project_name;
      $project->project_description = $request->project_description;
      $project->project_owner = Auth::user()->id;
      $project->project_status = 'Idea Generation';
      $project->project_tags = $request->tags;
      $project->unit_id = $request->unit_id;
      $project->save();

      for ($i=0; $i < count($request->member); $i++) {
        $member = new Member;
        $member->user_id = $request->member[$i];
        $member->role = $request->role[$i];
        $member->project_id = $project->id;
        $member->save();

      }

      return redirect()->back()->with(['success' => 'Project has been successfully submitted!']);
    }
    public function myprojectdetail($projectid)
    {
      $project = Project::find($projectid);
      $user = User::all();
      $problem = Problem::where('user_id',Auth::user()->id)->get();
      return view('project.projectdetail',['project'=>$project,'user'=>$user,'problem'=>$problem]);
    }
    public function updateproblem(Request $request,$id)
    {
      $project = Project::find($id);
      $project->problem_id = $request->problem;
      $project->save();
      return redirect()->back()->with(['success' => 'Project has been successfully Updated!']);
    }
    public function paingain(Request $request,$id)
    {
      $paingain = Paingain::where('project_id',$id)->first();
      if (!isset($paingain)) {
        DB::table('paingains')->insert(
            ['pain' => $request->pain, 'gain' => $request->gain,'project_id'=>$id,'created_at'=>date('Y-m-d H:i:s'),'updated_at'=>date('Y-m-d H:i:s')]
        );
      }else{
        DB::table('paingains')->where('project_id',$id)->update(
            ['pain' => $request->pain, 'gain' => $request->gain,'updated_at'=>date('Y-m-d H:i:s')]
        );
      }

      return redirect()->back()->with(['success' => 'Project has been successfully submitted!']);
    }
    public function goldencircle(Request $request,$id)
    {
      $paingain = Goldencircle::where('project_id',$id)->first();
      if (!isset($paingain)) {
        DB::table('goldencircles')->insert(
            ['why' => $request->why, 'how' => $request->how,'what' => $request->what,'unique_value' => $request->unique_value,'project_id'=>$id,'created_at'=>date('Y-m-d H:i:s'),'updated_at'=>date('Y-m-d H:i:s')]
        );
      }else{
        DB::table('goldencircles')->where('project_id',$id)->update(
            ['why' => $request->why, 'how' => $request->how,'what' => $request->what,'unique_value' => $request->unique_value,'updated_at'=>date('Y-m-d H:i:s')]
        );
      }

      return redirect()->back()->with(['success' => 'Project has been successfully submitted!']);
    }
    public function summary(Request $request,$id)
    {
      $paingain = Summary::where('project_id',$id)->first();
      if (!isset($paingain)) {
        DB::table('summarys')->insert(
            ['summary' => $request->summary, 'project_id'=>$id,'created_at'=>date('Y-m-d H:i:s'),'updated_at'=>date('Y-m-d H:i:s')]
        );
      }else{
        DB::table('summarys')->where('project_id',$id)->update(
            ['summary' => $request->summary,'updated_at'=>date('Y-m-d H:i:s')]
        );
      }

      return redirect()->back()->with(['success' => 'Project has been successfully submitted!']);
    }
    public function userjourney(Request $request,$id)
    {
      $paingain = Userjourney::where('project_id',$id)->first();
      if($request->file_upload != null) {

        $filename = 'userjourney-'.time() . '.' . $request->file_upload->getClientOriginalExtension();
        $request->file_upload->move(public_path('file'), $filename);
        if (!isset($paingain)) {
          DB::table('userjourneys')->insert(
              ['file' => $filename, 'project_id'=>$id,'created_at'=>date('Y-m-d H:i:s'),'updated_at'=>date('Y-m-d H:i:s')]
          );
        }else{
          DB::table('userjourneys')->where('project_id',$id)->update(
              ['file' => $filename,'updated_at'=>date('Y-m-d H:i:s')]
          );
        }
      }



      return redirect()->back()->with(['success' => 'Project has been successfully submitted!']);
    }
    public function productdevelopment(Request $request,$id)
    {
      $paingain = ProductDevelopment::where('project_id',$id)->first();
      if($request->mockup_file != null) {

        $filename = 'mockup-'.time() . '.' . $request->mockup_file->getClientOriginalExtension();
        $filenamedoc = 'doc-'.time() . '.' . $request->doc_file->getClientOriginalExtension();
        $request->mockup_file->move(public_path('file/mockup'), $filename);
        $request->doc_file->move(public_path('file/doc'), $filenamedoc);
        if (!isset($paingain)) {
          DB::table('product_developments')->insert(
              ['mockup_file' => $filename,'development_story'=>$request->development_story,'doc_file'=>$filenamedoc, 'project_id'=>$id,'created_at'=>date('Y-m-d H:i:s'),'updated_at'=>date('Y-m-d H:i:s')]
          );
        }else{
          DB::table('product_developments')->where('project_id',$id)->update(
              ['mockup_file' => $filename,'development_story'=>$request->development_story,'doc_file'=>$filenamedoc, 'updated_at'=>date('Y-m-d H:i:s')]
          );
        }
      }else {
        if (!isset($paingain)) {
          DB::table('product_developments')->insert(
              ['development_story'=>$request->development_story,'project_id'=>$id,'created_at'=>date('Y-m-d H:i:s'),'updated_at'=>date('Y-m-d H:i:s')]
          );
        }else{
          DB::table('product_developments')->where('project_id',$id)->update(
              ['development_story'=>$request->development_story,'updated_at'=>date('Y-m-d H:i:s')]
          );
        }
      }
      return redirect()->back()->with(['success' => 'Project has been successfully submitted!']);
    }

    public function pilotproject(Request $request,$id)
    {
      $paingain = PilotProject::where('project_id',$id)->first();
      $periode = $request->range_start.'-'.$request->range_end;
      if($request->doc_file != null) {

        // $filename = 'mockup-'.time() . '.' . $request->mockup_file->getClientOriginalExtension();
        $filenamedoc = 'doc-'.time() . '.' . $request->doc_file->getClientOriginalExtension();
        // $request->mockup_file->move(public_path('file/mockup'), $filename);
        $request->doc_file->move(public_path('file/doc'), $filenamedoc);
        if (!isset($paingain)) {
          DB::table('pilot_projects')->insert(
              ['periode'=>$periode,'lokasi_pilot'=>$request->lokasi_pilot,'development_story'=>$request->development_story,'doc_file'=>$filenamedoc, 'project_id'=>$id,'created_at'=>date('Y-m-d H:i:s'),'updated_at'=>date('Y-m-d H:i:s')]
          );
        }else{
          DB::table('pilot_projects')->where('project_id',$id)->update(
              ['periode'=>$periode,'lokasi_pilot'=>$request->lokasi_pilot,'development_story'=>$request->development_story,'doc_file'=>$filenamedoc,'updated_at'=>date('Y-m-d H:i:s')]
          );
        }
      }else {
        if (!isset($paingain)) {
          DB::table('pilot_projects')->insert(
              ['periode'=>$periode,'lokasi_pilot'=>$request->lokasi_pilot,'development_story'=>$request->development_story, 'project_id'=>$id,'created_at'=>date('Y-m-d H:i:s'),'updated_at'=>date('Y-m-d H:i:s')]
          );
        }else{
          DB::table('pilot_projects')->where('project_id',$id)->update(
              ['periode'=>$periode,'lokasi_pilot'=>$request->lokasi_pilot,'development_story'=>$request->development_story,'updated_at'=>date('Y-m-d H:i:s')]
          );
        }
      }
      return redirect()->back()->with(['success' => 'Project has been successfully submitted!']);
    }
    public function dasarimplementasi(Request $request,$id)
    {
      $paingain = DasarImplementasi::where('project_id',$id)->first();
      if($request->avidance_file != null) {

        // $filename = 'mockup-'.time() . '.' . $request->mockup_file->getClientOriginalExtension();
        $filenamedoc = 'doc-'.time() . '.' . $request->avidance_file->getClientOriginalExtension();
        // $request->mockup_file->move(public_path('file/mockup'), $filename);
        $request->avidance_file->move(public_path('file/doc'), $filenamedoc);

      }else {
        $filenamedoc = $paingain->avidance;
      }
        DB::table('dasar_implementasi')->insert(
            ['dasar_implementasi'=>$request->dasar_implementasi,'avidance'=>$filenamedoc, 'project_id'=>$id,'created_at'=>date('Y-m-d H:i:s'),'updated_at'=>date('Y-m-d H:i:s')]
        );
      return redirect()->back()->with(['success' => 'Project has been successfully submitted!']);
    }
    public function deletedasar(Request $request,$id){
      $flight = DasarImplementasi::find($id);

      $flight->delete();
      return redirect()->back()->with(['success' => 'Data has been successfully Deleted!']);
    }
    public function deleteimpact(Request $request,$id){
      $flight = Impact::find($id);

      $flight->delete();
      return redirect()->back()->with(['success' => 'Data has been successfully Deleted!']);
    }
    public function updatestatus(Request $request,$id)
    {
      // code...
      $flight = Project::find($id);

      $flight->project_status = $request->status;

      $flight->save();
      return redirect()->back()->with(['success' => 'Data has been successfully Updated!']);
    }
    public function sosialisasi(Request $request,$id)
    {
      $paingain = Sosialisasi::where('project_id',$id)->first();
      if (!isset($paingain)) {
        $sosis = DB::table('sosialisasi')->insertGetId(
            ['judul'=>$request->judul,'lokasi'=>$request->lokasi,'post'=>$request->post, 'project_id'=>$id,'created_at'=>date('Y-m-d H:i:s'),'updated_at'=>date('Y-m-d H:i:s')]
        );
      }else{
        DB::table('sosialisasi')->where('project_id',$id)->update(
            ['judul'=>$request->judul,'lokasi'=>$request->lokasi,'post'=>$request->post,'updated_at'=>date('Y-m-d H:i:s')]
        );
      }
      if($request->image != null) {
        for ($i=0; $i <count($request->image) ; $i++) {
          // $filename = 'mockup-'.time() . '.' . $request->mockup_file->getClientOriginalExtension();
          $filenamedoc = 'doc-'.time() . '.' . $request->image[$i]->getClientOriginalExtension();
          // $request->mockup_file->move(public_path('file/mockup'), $filename);
          $request->image[$i]->move(public_path('file/doc'), $filenamedoc);
          DB::table('sosialisasi_image')->insertGetId(
              ['image'=>$filenamedoc,'sosialisasi_id'=>$sosis,'created_at'=>date('Y-m-d H:i:s'),'updated_at'=>date('Y-m-d H:i:s')]
          );
        }


      }

      return redirect()->back()->with(['success' => 'Project has been successfully submitted!']);
    }
    public function impact(Request $request,$id)
    {
      // $paingain = Impact::where('project_id',$id)->first();
      // if (!isset($paingain)) {
        DB::table('impacts')->insert(
            ['impact' => $request->impact, 'detail' => $request->detail,'project_id'=>$id,'created_at'=>date('Y-m-d H:i:s'),'updated_at'=>date('Y-m-d H:i:s')]
        );
      // }

      return redirect()->back()->with(['success' => 'Project has been successfully submitted!']);
    }
}

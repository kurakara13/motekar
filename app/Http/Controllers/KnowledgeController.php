<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Project;
use App\Unit;
use App\User;
class KnowledgeController extends Controller
{
    public function knowledge()
    {
      $project = Project::all();
      return view('knowledge.knowledge',['projects'=>$project]);
    }
    public function problem($id)
    {
      $project = Project::find($id);
      return view('knowledge.knowledge-problem',['projects'=>$project]);
    }
    public function knowledgedetail($id)
    {
      // code...
      $project = Project::find($id);
      $unit = Unit::all();
      $user = User::all();
      return view('knowledge.knowledge-detail',['project'=>$project,'unit'=>$unit,'user'=>$user]);
    }
    public function brainstorming($id)
    {
      $project = Project::find($id);
      return view('knowledge.brainstorming',['projects'=>$project]);
    }
    public function gathering($id)
    {
      $project = Project::find($id);
      return view('knowledge.gathering',['projects'=>$project]);
    }
    public function development($id)
    {
      $project = Project::find($id);
      return view('knowledge.development',['projects'=>$project]);
    }

    public function pilot($id)
    {
      $project = Project::find($id);
      return view('knowledge.pilot',['projects'=>$project]);
    }
}

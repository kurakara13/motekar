<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Project;
class KnowledgeController extends Controller
{
    public function knowledge()
    {
      $project = Project::all();
      return view('knowledge.knowledge',['projects'=>$project]);
    }
    public function knowledgedetail($id)
    {
      // code...
      $project = Project::find($id);
      return view('knowledge.knowledge-detail',['projects'=>$project]);
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

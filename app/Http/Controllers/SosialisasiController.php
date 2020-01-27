<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Like;
use App\Comments;
use Response;
use Auth;

class SosialisasiController extends Controller
{
    public function like($id)
    {
      $like = Like::where('user_id', Auth::user()->id)->where('sosialisasi_id', $id)->first();
      if($like){
        $like->delete();

        return Response::json('dislike');
      }else {
        $like = new Like;
        $like->sosialisasi_id = $id;
        $like->user_id = Auth::user()->id;
        $like->save();

        return Response::json('like');
      }
    }

    public function comment(Request $request, $id){

      $comment = new Comments;
      $comment->user_id = Auth::user()->id;
      $comment->sosialisasi_id = $id;
      $comment->comment = $request->comment;
      $comment->save();

      return redirect()->back();
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Like;
use Response;
class SosialisasiController extends Controller
{
    public function like(Request $request,$id)
    {
      $like = new Like;
      $like->sosialisasi_id = $id;
      $like->user_id = $request->user_id;
      $like->save();
      return Response::json('success');
    }
}

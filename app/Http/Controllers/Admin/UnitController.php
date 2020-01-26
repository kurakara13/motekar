<?php
namespace App\Http\Controllers\Admin;

use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;
use App\User;
use App\Unit;
use Illuminate\Support\Facades\Auth;
use App\Notifications\Notification;
use Illuminate\Support\Facades\Hash;

class UnitController extends BaseController
{
    function index(){
      $unit = Unit::get();

      return view('admin.unit.index', compact('unit'));
    }

    function store(Request $request){
      $unit = new Unit;
      $unit->unit_name = $request->unit_name;
      $unit->save();

      return redirect()->back();
    }
}

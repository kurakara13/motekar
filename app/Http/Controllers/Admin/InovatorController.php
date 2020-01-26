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

class InovatorController extends BaseController
{
    function index(){
      $inovator = User::withCount('problem')->get();
      $unit = Unit::get();

      return view('admin.inovator.index', compact('inovator', 'unit'));
    }

    function store(Request $request){
      $user = new User;
      $user->username = $request->nik;
      $user->name = $request->nama;
      $user->posisi = $request->posisi;
      $user->unit = $request->id_unit;
      $user->password = Hash::make('motekar123');
      $user->save();

      return redirect()->back();
    }
}

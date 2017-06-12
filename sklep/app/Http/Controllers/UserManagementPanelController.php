<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;

class UserManagementPanelController extends Controller {
  public function __construct()
  {
      $this->middleware('auth');
  }
  public function index()
  {
    //wyświetlanie
//    $users = User::with('typKonta')->get();
      $users = DB::table('osoba')
          ->join('roles_has_users', 'osoba.osoba_id', '=', 'roles_has_users.users_id')
          ->select('osoba.*')
          ->where('roles_has_users.roles_id','=','1')
          ->get();
    //$users = User::all();
     return view('userManagementPanel.index',compact('users'));
  }

  public function blockUser($userID)
  {
    $user = User::where('osoba_id', $userID)->first();
    $user->zbanowany = 1;
    $user->save();
    return \redirect()->route('userManagementPanel.index');
  }

  public function unblockUser($userID)
  {
    $user = User::where('osoba_id', $userID)->first();
    $user->zbanowany = 0;
    $user->save();
    return \redirect()->route('userManagementPanel.index');
  }
}

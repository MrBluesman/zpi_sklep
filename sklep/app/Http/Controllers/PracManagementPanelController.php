<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PracManagementPanelController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        //wyświetlanie
        //$users = User::with('typKonta')->get();
        $users = DB::table('osoba')
            ->join('roles_has_users', 'osoba.osoba_id', '=', 'roles_has_users.users_id')
            ->select('osoba.*')
            ->where('roles_has_users.roles_id','=','2')
            ->get();
        //$users = User::all();
        return view('pracManagementPanel.index',compact('users'));
    }

    public function add()
    {
        return view('pracManagementPanel.add');
    }

    public function save(Request $request)
    {
        $user = new \App\User();
        $user->imie = $request->input('imie');
        $user->nazwisko = $request->input('nazwisko');
        $user->name = $request->input('imie');
        $user->email = $request->input('email');
        $user->password = bcrypt($request->input('password'));
        $user->pesel = $request->input('pesel');
        $user->nr_telefonu = $request->input('nr_telefonu');
        $user->save();
        $user->roles()->attach(2);

        return \redirect()->route('pracManagementPanel.index');
    }

//    public function blockUser($userID)
//    {
//        $user = User::where('osoba_id', $userID)->first();
//        $user->zbanowany = 1;
//        $user->save();
//        return \redirect()->route('userManagementPanel.index');
//    }
//
//    public function unblockUser($userID)
//    {
//        $user = User::where('osoba_id', $userID)->first();
//        $user->zbanowany = 0;
//        $user->save();
//        return \redirect()->route('userManagementPanel.index');
//    }
}

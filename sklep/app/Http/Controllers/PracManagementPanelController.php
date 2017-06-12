<?php

namespace App\Http\Controllers;

use App\Http\Requests\PracRequest;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use PDO;

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
        //DB::setFetchMode(PDO::FETCH_ASSOC);
        //DB::setFetchMode(\PDO::FETCH_ASSOC);
        $usersQuery = DB::table('osoba')
            ->join('roles_has_users', 'osoba.osoba_id', '=', 'roles_has_users.users_id')
            ->select('osoba.*')
            ->where('roles_has_users.roles_id','=','2')
            ->get()->all();
        //DB::setFetchMode(PDO::FETCH_CLASS);
       //$users = $usersQuery->toArray();
        $users = collect($usersQuery)->toArray();
            //->get();
        //$users = $users.
        return view('pracManagementPanel.index',compact('users'));
    }

    public function add()
    {
        return view('pracManagementPanel.add');
    }

    public function save(PracRequest $request)
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

    public function edit($userID)
    {
        $user = User::where('osoba_id', $userID)->first();

        return view('pracManagementPanel.edit', compact('user'));
    }

    public function update(PracRequest $request, User $user)
    {
        $user->email = $request->input('email');
        $user->imie = $request->input('imie');
        $user->nazwisko = $request->input('nazwisko');
        $user->pesel = $request->input('pesel');
        $user->nr_telefonu = $request->input('nr_telefonu');
        $user->save();
        return \redirect()->route('pracManagementPanel.index');
    }

    public function destroy($userID)
    {
        $user = User::where('osoba_id', $userID)->first();
        $user->delete();
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

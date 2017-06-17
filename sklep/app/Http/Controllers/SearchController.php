<?php

namespace App\Http\Controllers;

use App\Album;
use App\Artist;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class SearchController extends Controller
{
    public function find(Request $request)
    {
        //return User::search($request->get('q'))->with('profile')->get();
        //return User::search($request->get('q'))->get();
        //$data  = Album::all();
        //$data = Album::search($request->get('q'))->get();
        $data = Artist::where('nazwa','like','%' . $request->get('q') . '%')->get();
        //return User::all();
//        foreach($data as $index=>$artysta ){
//            $usersArray[$index] = [
//                'tytul' => $artysta->nazwa,
////                'avatar_path' => URL::asset($user->avatar_path)
//            ];
//        }

        return response()->json($data);

    }
}

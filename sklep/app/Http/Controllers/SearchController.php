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
        $artistArray = array();
        foreach($data as $index=>$artysta )
        {
            $artistArray[$index] = [
                'nazwa' => $artysta->nazwa,
                'id' => $artysta->artysta_id,
                'klasa' => 'artysta',
//                'avatar_path' => URL::asset($user->avatar_path)
            ];
        }


        $data2 = Album::where('tytul', 'like','%' . $request->get('q') . '%')->get();
        $albumArray = array();
        foreach($data2 as $index=>$plyta )
        {
            //dd($plyta);
            $albumArray[$index] = [
                'nazwa' => $plyta->tytul,
                'id' => $plyta->plyta_id,
                'klasa' => 'album',
//                'avatar_path' => URL::asset($user->avatar_path)
            ];
        }

        $result = array_merge($artistArray, $albumArray);
        return response()->json($result);

    }
}

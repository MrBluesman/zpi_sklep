<?php

namespace App\Http\Controllers;

use App\Artist;
use Illuminate\Http\Request;

class UserArtistsController extends Controller
{
    public function index()
    {
        //wyświetlanie
        $artists = Artist::all();

        return view('userArtists.index', compact('artists'));
        //lub
//        return view('artists.index', [
//            'artists' => $artists
//        ]);
    }

    public function details(Artist $artist)
    {
        //dd($artist->all());
        return view('userArtists.details', compact('artist'));
    }
}

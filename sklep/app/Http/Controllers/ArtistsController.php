<?php

namespace App\Http\Controllers;

use App\Artist;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class ArtistsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        //wyświetlanie
        $artists = Artist::all();

        return view('artists.index', compact('artists'));
        //lub
//        return view('artists.index', [
//            'artists' => $artists
//        ]);
    }

    public function addArtist()
    {
        return view('artists.addArtist');
    }

    public function saveArtist(Request $request)
    {
        Artist::create($request->all());
        //metoda 2
//        $artist = new Artist();
//        $artist->nazwa = $request->input('nazwa');
//        $artist->opis = $request->input('opis');
//        $artist->save();
        //DB::insert('insert into artysta (Nazwa, Opis) values (?,?)');
        return \redirect()->route('artists.index');
    }

    public function details(Artist $artist)
    {
        //dd($artist->all());
        return view('artists.details', compact('artist'));
    }



}

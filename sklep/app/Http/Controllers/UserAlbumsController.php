<?php

namespace App\Http\Controllers;

use App\Album;
use Illuminate\Http\Request;

class UserAlbumsController extends Controller
{
    public function index() {
        $albums = Album::with('Artist')->get();
        /*foreach($albums as $album){
            if($album->plik == null ){}
            else{

                $url = Storage::url($album->plik);

                return $url;
            }

        }*/
        return view('userAlbums.index', compact('albums'));
    }

    public function details(Album $album)
    {
        //dd($artist->all());
        //$albums = Album::where('plyta_id', $album->plyta_id)->get();
        //return view('userAlbums.details', compact('artist', 'albums'));
        return view('userAlbums.details', compact('album'));
    }
}

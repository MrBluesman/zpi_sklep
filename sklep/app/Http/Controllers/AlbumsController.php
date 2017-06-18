<?php

namespace App\Http\Controllers;

use App\Album;
use App\Artist;
use App\Cart;
use App\Type;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Session;
use Storage;

class AlbumsController extends Controller
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
    return view('albums.index', compact('albums'));
  }

    public function add() {
        $artists = Artist::all();
        $types = Type::all();
        //return view('albums.addAlbum')->with('Artist', $items);
        return view('albums.addAlbum', compact('artists', 'types'));
    }

    public function edit(Album $album) {
        $artists = Artist::all();
        $types = Type::all();

       // $selectedartist = Artist::where('artysta_id', '=', 2);
        //return view('albums.addAlbum')->with('Artist', $items);

       return view('albums.editAlbum', compact('artists', 'types', 'album'));
        //dd($album->all());
    }

    public function save(Request $request) {

        //Album::create($request->all());
        //dd($request->all());

        $album = new Album();
        $album->tytul = $request->input('tytul');
        $album->rok = $request->input('rok');
        $album->data_wydania = $request->input('data_wydania');
        $album->cena_fizyczna = $request->input('cena_fizyczna');
        $album->cena_cyfrowa = $request->input('cena_cyfrowa');
        $album->dostepnosc = $request->input('dostepnosc');
        $album->artystaid = $request->input('artystaid');
        $album->gatunekid = $request->input('gatunekid');
        if ($request->hasFile('plik'))  {
            $file = request()->file('plik')->store('public/images');
            $url = Storage::url($file);
            //$path = $file->path();
            $album->plik = $url;
            //return Storage::url($file);
        }
        $album->save();
        return \redirect()->route('albums.index');
    }

    public function change(Request $request, Album $album) {


        //dd($request->all());
        //echo $id;
        //dd($album->all());
        $album->tytul = $request->input('tytul');
        $album->tytul = $request->input('tytul');
        $album->rok = $request->input('rok');
        $album->data_wydania = $request->input('data_wydania');
        $album->cena_fizyczna = $request->input('cena_fizyczna');
        $album->cena_cyfrowa = $request->input('cena_cyfrowa');
        $album->dostepnosc = $request->input('dostepnosc');
        $album->artystaid = $request->input('artystaid');
        $album->gatunekid = $request->input('gatunekid');
        if ($request->hasFile('plik'))  {
            /*$todelete = $album->plik;
            File::delete($todelete);*/
            $file = request()->file('plik')->store('public/images');
            $url = Storage::url($file);
            //echo ($file);
            //$path = $file->path();
            $album->plik = $url;
            //return Storage::url($file);

        }
        $album->save();
        return \redirect()->route('albums.index');

    }

    public function delete(Request $request, Album $album) {


        //dd($request->all());
        //echo $id;
        //dd($album->all());
        $path = $album->plik;
        $file = basename($path);         // $file is set to "index.php"
        //echo ($file);
        //$file = basename($path, ".php");
        Storage::Delete($file);
        //File::Delete($album->plik);
        $album->delete();
        return \redirect()->route('albums.index');

    }


}

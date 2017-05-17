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

class AlbumsController extends Controller
{
  public function index() {
    $albums = Album::with('Artist')->get();
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
        $album->save();
        return \redirect()->route('albums.index');

    }

    public function delete(Request $request, Album $album) {


        //dd($request->all());
        //echo $id;
        //dd($album->all());
        $album->delete();
        return \redirect()->route('albums.index');

    }

    public function addToCart(Request $request, Album $album)
    {
        //$album = Album::find($id);
        //$oldCart = Session::has('Cart') ? Session::get('cart') : null;
        $oldCart = Session::has('cart')?$request->session()->get('cart'):null;
        $cart = new Cart($oldCart);
        $cart->add($album, $album['plyta_id'], 1);

        $request->session()->put('cart',$cart);
        //dd($request->session()->get('cart'));
        return redirect()->route('albums.index');

    }

    public function getCart()
    {
        if(!Session::has('cart'))
        {
            return view('albums.koszyk', ['albums'=> null]);
        }
        $oldCart = Session::get('cart');
        $cart = new Cart($oldCart);
        //dd(session()->get('cart'));
        return view('albums.koszyk', ['albums'=> $cart->items, 'totalprice'=>$cart->totalPrice]);
    }
}

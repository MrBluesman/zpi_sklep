<?php

namespace App\Http\Controllers;

use App\PozycjeZamowienia;
use App\Status;
use Illuminate\Http\Request;
use App\Cart;
use App\Album;
use App\DiscountCode;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Session;
use App\Zamowienie;
use App\User;
use Illuminate\Support\Facades\Auth;
use App\Adres;



class ZamowienieController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    public function user()
    {
        $statusy = Status::all();
        $userId = Auth::id();
        $zamowiania = Zamowienie::where('klientId',$userId )->get();
        //dd($zamowiania);
        return view('UserZamowienie.index', compact('zamowiania', 'statusy'));
    }

    public function userDetails(Zamowienie $zamowienie)
    {

        //$zamowienie = Zamowienie::find($zamowienie);

        //$adres = Adres::where('adres_id', $zamowienie['adresId'])->get();
        $adres = $zamowienie->adres()->first();

        $pozycjezam = PozycjeZamowienia::where('zamowienieId',$zamowienie['zamowienie_id'])->get();
        //$pozycjezam = $zamowienie->pozycjeZamowienia()->get();

        $plyta = [];
        $statusy = Status::all();
        foreach($pozycjezam as $zam){
            array_push($plyta,Album::where('plyta_id',$zam['plytaId'])->first());
        }
        //$adres =  $zamowienie->adres();
       // dd($adres);
        return view('UserZamowienie.details', compact('zamowienie', 'adres', 'pozycjezam','statusy','plyta'));
    }

    public function prac()
    {
        $statusy = Status::all();
        //$userId = Auth::id();
        $zamowiania = Zamowienie::all();
        //dd($zamowiania);
        return view('pracZamowienie.index', compact('zamowiania', 'statusy'));
    }

    public function pracDetails(Zamowienie $zamowienie)
    {

        //$zamowienie = Zamowienie::find($zamowienie);

        //$adres = Adres::where('adres_id', $zamowienie['adresId'])->get();
        $adres = $zamowienie->adres()->first();

        $pozycjezam = PozycjeZamowienia::where('zamowienieId',$zamowienie['zamowienie_id'])->get();
        //$pozycjezam = $zamowienie->pozycjeZamowienia()->get();

        $plyta = [];
        $statusy = Status::all();
        foreach($pozycjezam as $zam){
            array_push($plyta,Album::where('plyta_id',$zam['plytaId'])->first());
        }
        //$adres =  $zamowienie->adres();
        //dd($zamowienie);
        return view('PracZamowienie.details', compact('zamowienie', 'adres', 'pozycjezam','statusy','plyta'));
    }

    public function pracZmienStatus(Zamowienie $zamowienie, Request $request)
    {
        //dd($zamowienie);
        //dd($request->all());
        $zamowienie->statusId = $request->input('status');
        $zamowienie->save();
        return \redirect(route('pracZamowienie.pracDetails', $zamowienie));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        //dd($request->all());

        //Adres
        $adres = new Adres();
        $adres->miasto = $request->input('miasto');
        $adres->ulica = $request->input('ulica');
        $adres->nr_domu = $request->input('numer_domu');
        $adres->nr_mieszkania = $request->input('numer_mieszkania');
        $adres->kod_pocztowy = $request->input('kod_pocztowy');
        $adres->save();


        $cart = Session::has('cart')?$request->session()->get('cart'):null;
        //dd($cart);


        //Zamowienie

        $zamowienie = new Zamowienie();
        $total = number_format((1 - $cart->discountCode) * $cart->totalPrice, 2);
        $zamowienie->cena = $total;
        $zamowienie->metoda_platnosci = $request->input('metoda_platnosci');
        if($cart->discountCode == null){
            $zamowienie->znizka = 0;
        }
        else{
            $zamowienie->znizka = $cart->discountCode;
        }
        $zamowienie->statusid = 1;
        $userId = Auth::id();
        $zamowienie->klientId = $userId;
        $zamowienie->adresId = $adres->adres_id;
        $zamowienie->save();


        foreach ($cart->items as $poz){
            //dd($poz['item']->plyta_id);
            $pozyczam = new PozycjeZamowienia();
            $pozyczam->plytaId = $poz['item']->plyta_id;
            $pozyczam->ilosc =  $poz['qty'];
            $pozyczam->czy_fizyczna = 1;
            $pozyczam->zamowienieId = $zamowienie->zamowienie_id;
            $pozyczam->save();
        }


        $request->session()->forget('cart');
        return route('userZamowienie.index');


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

<?php

namespace App\Http\Controllers;

use App\DiscountCode;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class DiscountCodesController extends Controller
{

    public function index()
    {
        //wyświetlanie
        $codes = DiscountCode::all();

        return view('discountCodes.index', compact('codes'));
    }

    public function addCode()
    {
        return view('discountCodes.addCode');
    }

    public function saveCode(Request $request)
    {
        //DiscountCode::create($request->all());
        $code = new DiscountCode;
        $code->tresc = $request->input('tresc');
        $code->znizka = $request->input('znizka') / 100.0;
        $code->save();
        return \redirect()->route('discountCodes.index');
    }

    public function deleteCode($kodTresc)
    {
        $delcode = DiscountCode::where('tresc', $kodTresc);
        $delcode->delete();
        $codes = DiscountCode::all();
        return view('discountCodes.index', compact('codes'));
    }

}

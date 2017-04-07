<?php

namespace App\Http\Controllers;

use App\Album;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class AlbumsController extends Controller
{
  public function index() {
    $albums = Album::with('Artist')->get();
    return view('albums.index', compact('albums'));
  }
}

<?php

namespace App\Http\Controllers;

use App\Models\Games;
use Illuminate\Http\Request;

class GamesController extends Controller
{
  public function index()
  {
    return view('games.index', ['games' => Games::all()]);
  }
}

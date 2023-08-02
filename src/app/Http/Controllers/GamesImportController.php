<?php

namespace App\Http\Controllers;

use App\Models\Games;
use App\Imports\GamesImport;

use Maatwebsite\Excel\Facades\Excel;

class GamesImportController extends Controller
{
  public function index()
  {
    Games::truncate();
    Excel::import(new GamesImport, storage_path('public/games.csv'));

    return "CSV file imported successfully.";
  }
}

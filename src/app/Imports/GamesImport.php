<?php

namespace App\Imports;

use App\Models\Games;
use Illuminate\Support\Facades\Hash;

use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class GamesImport implements ToModel, WithHeadingRow
{
  /**
   * @param array $row
   *
   * @return Game|null
   */
  public function model(array $row)
  {
    return new Games([
      'title' => $row['title'],
      'release_date' => $row['release_date'],
      'platform' => $row['platform'],
      'developer' => $row['developer'],
      'genre' => $row['genre'],
      'content' => $row['content'],
    ]);
  }
}

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
   * @return Games|null
   */
  public function model(array $row)
  {
    return new Games([
      'title' => $row['title'],
      'release_date' => $row['release_date'],
      'platform' => json_encode(explode(', ', $row['platform'])),
      'developer' => json_encode(explode(' / ', $row['developer'])),
      'genre' => json_encode(explode(' / ', $row['genre'])),
      'content' => json_encode(array(
        'original' => $row['content'],
        'generated' => '',
      ))
    ]);
  }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Models\Games;
use Inertia\Inertia;

class GamesController extends Controller
{
  public function home()
  {
    return Inertia::render('Home', array(
      'games' => Games::all(),
      'years' => $this->get_years(),
      'genres' => $this->get_distinct_items('genre'),
      'platforms' => $this->get_distinct_items('platform'),
      'developers' => $this->get_distinct_items('developer'),
    ));
  }

  public function single_page()
  {
    return Inertia::render('Single', array());
  }

  private function get_years()
  {
    $items = Games::select('release_date', DB::raw('COUNT(*) as col_total'))
      ->groupBy('release_date')
      ->orderBy('release_date', 'asc')
      ->get();

    return $items->pluck('col_total', 'release_date');
  }

  private function get_distinct_items($columnName)
  {
    $distinctItems = DB::table('games')
      ->select(DB::raw("DISTINCT jsonb_array_elements_text({$columnName}) as col_item, COUNT(*) as col_total"))
      ->groupBy('col_item')
      ->orderBy('col_total', 'desc')
      ->get();

    return $distinctItems->pluck('col_total', 'col_item');
  }

  public function single($id)
  {
    $game = Games::find($id);

    if ($game === null) {
      abort(404);
    }

    $content = json_decode($game->content);

    if (empty($content->generated)) {
      $game = $this->generateReview($game);
    }

    return view('games.single', [
      'game' => $game,
      'content' => nl2br(json_decode($game->content)->generated),
    ]);
  }

  private function generateReview($game)
  {
    $url = 'https://api.openai.com/v1/chat/completions';

    $postData = array(
      "model" => "gpt-3.5-turbo",
      "messages" => array(
        array("role" => "system", "content" => "You are an editor for a gaming magazine, rewrite the given article"),
        array("role" => "user", "content" => json_decode($game->content)->original)
      ),
      "n" => 1,
      "temperature" => 0.8,
      "max_tokens" => 800,
    );

    $headers = array(
      'Content-Type: application/json',
      'Authorization: Bearer ' . config('app.gpt_key')
    );

    $ch = curl_init($url);

    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($postData));
    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

    $response = curl_exec($ch);

    if (!$response) {
      die('Error: "' . curl_error($ch) . '" - Code: ' . curl_errno($ch));
    }

    curl_close($ch);

    $decoded_response = json_decode($response);
    $response_content = '';

    try {
      $response_content = $decoded_response->choices[0]->message->content;

      DB::table('games')
        ->where('id', $game->id)
        ->update(['content->generated' => $response_content]);
    } catch (\Exception $e) {
    }

    return Games::find($game->id);
  }
}

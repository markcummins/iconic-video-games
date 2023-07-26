<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Games>
 */
class GamesFactory extends Factory
{
  /**
   * Define the model's default state.
   *
   * @return array<string, mixed>
   */
  public function definition()
  {
    return [
      'title' => $this->faker->sentence,
      'release_date' => $this->faker->year(),
      'platform' => $this->faker->word,
      'developer' => $this->faker->company,
      'genre' => $this->faker->word,
      'content' => $this->faker->paragraph,
    ];
  }
}

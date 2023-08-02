<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    Schema::create('games', function (Blueprint $table) {
      $table->id();
      $table->string('title');
      $table->year('release_date');
      $table->jsonb('platform');
      $table->jsonb('developer');
      $table->jsonb('genre');
      $table->jsonb('content');
      $table->timestamps();
    });
  }

  /**
   * Reverse the migrations.
   *
   * @return void
   */
  public function down()
  {
    Schema::dropIfExists('games');
  }
};

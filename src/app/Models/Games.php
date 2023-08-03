<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Games extends Model
{
  protected $fillable = [
    'title',
    'release_date',
    'platform',
    'developer',
    'genre',
    'content',
  ];

  protected $casts = [
    'platform' => 'array',
    'developer' => 'array',
    'genre' => 'array',
    'content' => 'object',
  ];

  use HasFactory;
}

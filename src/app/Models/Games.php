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

  use HasFactory;
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Albums extends Model
{
   protected $fillable = [
    'name',
    'file',
    'gender',
    'year',
    'label',
    'note',
    'artists' => 'array',
    'songs' => 'array'
  ];
}

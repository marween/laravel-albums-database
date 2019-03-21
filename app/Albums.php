<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Albums extends Model
{
   protected $fillable = [
    'id',
    'name',
    'file',
    'gender',
    'year',
    'label',
    'note',
    'artists',
    'songs'
  ];
}

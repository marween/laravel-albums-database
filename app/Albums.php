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
    'artists',
    'songs'
  ];

    protected $hidden = [
        'created_at', 'updated_at',
    ];
}

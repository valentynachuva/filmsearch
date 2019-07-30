<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class films extends Model
{
    protected $fillable= [
        'title',
        'year',
        'director',
        'plot',
        'poster',
        'imdb_id',
        'production',
        'website'
    ];
}

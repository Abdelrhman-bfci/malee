<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Charity extends Model
{
    public $timestamps = false;
    protected $table = 'Charity';
    protected $guarded = [];
}

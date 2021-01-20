<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PlayerCharity extends Model
{
    public $timestamps = false;
    protected $table = 'player_charity';
    protected $guarded = [];
}

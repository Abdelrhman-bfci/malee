<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PlayerItem extends Model
{
    public $timestamps = false;
    protected $table = 'player_item';
    protected $guarded = [];
}

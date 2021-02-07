<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PlayerItem extends Model
{
    public $timestamps = false;
    protected $table = 'Player_Item';
    protected $guarded = [];
}

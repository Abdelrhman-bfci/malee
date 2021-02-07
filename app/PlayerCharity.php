<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PlayerCharity extends Model
{
    public $timestamps = false;
    protected $table = 'Player_Charity';
    protected $guarded = [];
}

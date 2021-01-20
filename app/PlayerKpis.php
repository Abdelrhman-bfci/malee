<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PlayerKpis extends Model
{
    public $timestamps = false;
    protected $table = 'player_kpis';
    protected $guarded = [];

    public function player(){
        return $this->belongsTo(Player::class , 'FK_player_id','id');
    }
}

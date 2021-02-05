<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Player extends Model
{
    public $timestamps = false;
    protected $table = 'player';
    protected $guarded = [];

    public function charities(){
        return $this->belongsToMany(Charity::class , 'player_charity', 'FK_Player','FK_Charity','PK_Player','PK_Charity')
            ->withPivot('MoneyBefore');
    }

    public function items(){
        return $this->belongsToMany(Item::class , 'player_item', 'FK_Player','FK_Item','PK_Player','PK_Item')
            ->withPivot('MoneyBefore','ItemDisplayedPrice','PriceMultiplier','FK_CellIndex');
    }

    public function plans(){
        return $this->belongsToMany(Item::class , 'Player_plan', 'FK_Player','FK_Item','PK_Player','PK_Item');
    }

    public function kpis(){
        return $this->belongsTo(PlayerKpis::class , 'FK_player_id','PK_Player');
    }
}

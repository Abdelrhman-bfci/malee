<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    public $timestamps = false;
    protected $table = 'Item';
    protected $guarded = [];

    public function type(){
        return $this->belongsTo(ItemType::class , 'FK_ItemType' , 'PK_ItemType');
    }
}

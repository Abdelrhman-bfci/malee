<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ItemType extends Model
{
    public $timestamps = false;
    protected $table = 'itemtype';
    protected $guarded = [];
}

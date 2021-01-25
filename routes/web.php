<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    $player = \App\Player::where('PK_Player', 1772)->first();
    $item = \App\Item::where('PK_Item', 4)->first();
    dd($player->charities);
//    $player->charities;
//    $player->items()->leftJoin('itemtype', 'itemtype.PK_ItemType','=','item.FK_ItemType')
//        ->where('itemtype.IsImportant', 1)->get();
//    $player->items()
//        ->leftJoin('itemtype', 'itemtype.PK_ItemType','=','item.FK_ItemType')
//        ->pluck('ItemDisplayedPrice');
//    $total = [];
//    foreach ($player->items()->leftJoin('itemtype', 'itemtype.PK_ItemType','=','item.FK_ItemType')
//                 ->where('itemtype.IsImportant', 1)->get() as $item){
//        array_push($total , $item->pivot->ItemDisplayedPrice);
//    }
// dd(array_sum($total));
});

Route::get('/playerKpis/{player_id}' , 'KpiController@index');

Route::get('/malee' , 'KpiController@statistics');


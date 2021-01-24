<?php

namespace App\Http\Controllers;

use App\Player;
use App\PlayerKpis;
use Illuminate\Http\Request;

class KpiController extends Controller
{
    public function index(Request $request , $player_id){

        $player = Player::where('PK_Player', $player_id)->first();
        if ($player){
            if ($player->items){
<<<<<<< Updated upstream

                $needItemsCount = $player->items()->leftJoin('ItemType', 'ItemType.PK_ItemType','=','Item.FK_ItemType')->OrderBy('FK_CellIndex')->limit(5)->where('ItemType.IsImportant', 1)->count();

                ($needItemsCount >= 3)? $kpi1 = 1 : $kpi1 = 0;
                ($needItemsCount >= 4)? $kpi3 = 1 : $kpi3 = 0;

                /////
                $totalNeedItems = [];
                foreach ($player->items()->leftJoin('ItemType', 'ItemType.PK_ItemType','=','Item.FK_ItemType')
                             ->where('ItemType.IsImportant', 1)->get() as $item){
                    array_push($totalNeedItems , $item->pivot->ItemDisplayedPrice);
                }

                $cond4 = ($player->items()
                        ->leftJoin('ItemType', 'ItemType.PK_ItemType','=','Item.FK_ItemType')
                        ->where('FK_CellIndex' , '<=', 5)
                        ->where('ItemType.PK_ItemType', 7)->count() > 0);

                $cond4 ? $kpi2 = 1 : $kpi2 =0;

                $totalWantItems = [];
                foreach ($player->items()->leftJoin('ItemType', 'ItemType.PK_ItemType','=','Item.FK_ItemType')
                             ->where('ItemType.IsImportant', 0)->get() as $item){
                    array_push($totalWantItems , $item->pivot->ItemDisplayedPrice);
                }

                $totalDisplayPrice = [];
                foreach ($player->items()->leftJoin('ItemType', 'ItemType.PK_ItemType','=','Item.FK_ItemType')->get() as $item){
                    array_push($totalDisplayPrice , $item->pivot->ItemDisplayedPrice);
                }

                $count = $player->items()->whereIn('Item.PK_Item',[19,20])->count();
                ($count>0)? $kpi21 = 1: $kpi21 = 0;

                $kpi4 = array_sum($totalNeedItems)? (array_sum($totalWantItems)/ array_sum($totalNeedItems))*100 : 0;

                ////
                $cond1 = $player->Income? (array_sum($totalDisplayPrice) / $player->Income)*100 : 0;
                $cond2 = $player->Income ? ($player->CharityPoints / $player->Income)*100 : 0;
                $cond3 = $player->Income? ($player->Money / $player->Income)*100: 0;
                (($cond1 >= 60  && $cond1 <= 80) || ($cond2 > 10 && $cond2 <= 40) ||  ($cond3 > 10 && $cond3<= 40)) ? $kpi5 = 1 :  $kpi5 = 0;

                $kpi13 = $cond3;
=======

                $needItemsCount = $player->items()->leftJoin('itemtype', 'itemtype.PK_ItemType','=','item.FK_ItemType')->limit(5)->where('itemtype.IsImportant', 1)->count();
                ($needItemsCount > 3)? $kpi1 = 1 : $kpi1 = 0;
                ($needItemsCount > 4)? $kpi3 = 1 : $kpi3 = 0;

                /////
                $totalNeedItems = [];
                foreach ($player->items()->leftJoin('itemtype', 'itemtype.PK_ItemType','=','item.FK_ItemType')
                             ->where('itemtype.IsImportant', 1)->get() as $item){
                    array_push($totalNeedItems , $item->pivot->ItemDisplayedPrice);
                }

                $totalWantItems = [];
                foreach ($player->items()->leftJoin('itemtype', 'itemtype.PK_ItemType','=','item.FK_ItemType')
                             ->where('itemtype.IsImportant', 0)->get() as $item){
                    array_push($totalWantItems , $item->pivot->ItemDisplayedPrice);
                }

                $kpi4 = (array_sum($totalWantItems)/ array_sum($totalNeedItems))*100;

                ////
                $cond1 = ($player->CharityPoints / $player->Income)*100;
                $cond2 = ($player->DsiplayedPrice / $player->Income)*100;
                $cond3 = ($player->Money / $player->Income)*100;
                (($cond1 >= 60  && $cond1 <= 80) || ($cond2 > 10 && $cond2 <= 40) ||  ($cond3 > 10 && $cond3<= 40)) ? $kpi5 = 1 :  $kpi5 = 0;
>>>>>>> Stashed changes

                ($player->InvestmentReturn > 0) ? $kpi9 = 1 : $kpi9 = 0;
<<<<<<< Updated upstream
//                ($player->items->count() > 8 && ($cond3 >= 5 && $cond3 < 20 )) ? $kpi12 = 1 : $kpi12 = 0;

                $charityValue = [];
                $charityMoneyBefore = [];

                foreach ( $player->charities()->get() as $charity){
                    array_push($charityValue , $charity->Value);
                    array_push($charityMoneyBefore , $charity->pivot->MoneyBefore);
                }

                $kpi17 = (array_sum($charityMoneyBefore) > 0) ? (array_sum($charityValue)/array_sum($charityMoneyBefore))*100 : 0;

                ($player->items->count() >= 7 && ($cond2 >= 8 && $cond2 <= 15 ) && ($cond3 >= 10)) ? $kpi18 = 1 : $kpi18 = 0;
=======
                ($player->items->count() > 8 && ($cond3 >= 5 && $cond3 < 20 )) ? $kpi12 = 1 : $kpi12 = 0;
                ($player->items->count() >= 7 && ($cond1 >= 8 && $cond1 < 15 )) ? $kpi18 = 1 : $kpi18 = 0;
>>>>>>> Stashed changes

                $playerKPi = PlayerKpis::where('FK_player_id', $player->PK_Player)->first();
                if ($playerKPi){
                    $playerKPi->update(
                        ['FK_player_id' => $player->PK_Player ,
                            'kpi1' => $kpi1 ,
<<<<<<< Updated upstream
                            'kpi2' => $kpi2 ,
=======
>>>>>>> Stashed changes
                            'kpi3' => $kpi3 ,
                            'kpi4' =>$kpi4 ,
                            'kpi5' =>$kpi5 ,
                            'kpi9' =>$kpi9,
<<<<<<< Updated upstream
                            'kpi13' =>$kpi13,
                            'kpi17' =>$kpi17,
                            'kpi18' =>$kpi18,
                            'kpi21' =>$kpi21,
=======
                            'kpi12' =>$kpi12,
                            'kpi18' =>$kpi18,
>>>>>>> Stashed changes
                        ]);
                }else{
                    $playerKPi =  PlayerKpis::create(
                        ['FK_player_id' => $player->PK_Player ,
                            'kpi1' => $kpi1 ,
<<<<<<< Updated upstream
                            'kpi2' => $kpi2 ,
=======
>>>>>>> Stashed changes
                            'kpi3' => $kpi3 ,
                            'kpi4' =>$kpi4  ,
                            'kpi5' =>$kpi5 ,
                            'kpi9' =>$kpi9 ,
<<<<<<< Updated upstream
                            'kpi13' =>$kpi13,
                            'kpi17' =>$kpi17,
                            'kpi18' =>$kpi18,
                            'kpi21' =>$kpi21,
=======
                            'kpi12' =>$kpi12 ,
                            'kpi18' =>$kpi18,
>>>>>>> Stashed changes
                        ]);
                }

                return response($playerKPi);
            }
        }
    }

    public function statistics(Request $request){
        PlayerKpis::Resolve();

        $total = PlayerKpis::count();
        $state1 = PlayerKpis::where('kpi1', 1)->count();
        $state2 = PlayerKpis::where('kpi3', 1)->count();
        $state3 = 0; //PlayerKpis::where('kpi3', 1)->count();
        $state4 = PlayerKpis::where('kpi5', 1)->count();
        $state5 = 0; //PlayerKpis::where('kpi3', 1)->count();
        $state6 = PlayerKpis::where('kpi9', 1)->count();
        $state7 = 0 ;//PlayerKpis::where('kpi9', 1)->count();
        $state8 = 0 ; //PlayerKpis::where('kpi9', 1)->count();
        $state9 = PlayerKpis::where('kpi18', 1)->count();
        $state10 = PlayerKpis::where('kpi21', 1)->count();

        $statistics = (object)[
                                'state1' => $state1,
                                'state2' => $state2,
                                'state3' => $state3,
                                'state4' => $state4,
                                'state5' => $state5,
                                'state6' => $state6,
                                'state7' => $state7,
                                'state8' => $state8,
                                'state9' => $state9,
                                'state10' => $state10,
                              ];


        return view('statistics' , compact('statistics','total'));



    }

<<<<<<< Updated upstream

    public function Resolve($player_id)
    {
=======
    public  function  Resolve($player_id){
>>>>>>> Stashed changes
        $player = Player::where('PK_Player', $player_id)->first();
        if ($player){
            if ($player->items){

<<<<<<< Updated upstream
                $needItemsCount = $player->items()->leftJoin('ItemType', 'ItemType.PK_ItemType','=','Item.FK_ItemType')->OrderBy('FK_CellIndex')->limit(5)->where('ItemType.IsImportant', 1)->count();

                ($needItemsCount >= 3)? $kpi1 = 1 : $kpi1 = 0;
                ($needItemsCount >= 4)? $kpi3 = 1 : $kpi3 = 0;

                /////
                $totalNeedItems = [];
                foreach ($player->items()->leftJoin('ItemType', 'ItemType.PK_ItemType','=','Item.FK_ItemType')
                             ->where('ItemType.IsImportant', 1)->get() as $item){
                    array_push($totalNeedItems , $item->pivot->ItemDisplayedPrice);
                }

                $cond4 = ($player->items()
                        ->leftJoin('ItemType', 'ItemType.PK_ItemType','=','Item.FK_ItemType')
                        ->where('FK_CellIndex' , '<=', 5)
                        ->where('ItemType.PK_ItemType', 7)->count() > 0);

                $cond4 ? $kpi2 = 1 : $kpi2 =0;

                $totalWantItems = [];
                foreach ($player->items()->leftJoin('ItemType', 'ItemType.PK_ItemType','=','Item.FK_ItemType')
                             ->where('ItemType.IsImportant', 0)->get() as $item){
                    array_push($totalWantItems , $item->pivot->ItemDisplayedPrice);
                }

                $totalDisplayPrice = [];
                foreach ($player->items()->leftJoin('ItemType', 'ItemType.PK_ItemType','=','Item.FK_ItemType')->get() as $item){
                    array_push($totalDisplayPrice , $item->pivot->ItemDisplayedPrice);
                }

                $count = $player->items()->whereIn('Item.PK_Item',[19,20])->count();
                ($count>0)? $kpi21 = 1: $kpi21 = 0;

                $kpi4 = array_sum($totalNeedItems)? (array_sum($totalWantItems)/ array_sum($totalNeedItems))*100 : 0;

                ////
                $cond1 = $player->Income? (array_sum($totalDisplayPrice) / $player->Income)*100 : 0;
                $cond2 = $player->Income ? ($player->CharityPoints / $player->Income)*100 : 0;
                $cond3 = $player->Income? ($player->Money / $player->Income)*100: 0;
                (($cond1 >= 60  && $cond1 <= 80) || ($cond2 > 10 && $cond2 <= 40) ||  ($cond3 > 10 && $cond3<= 40)) ? $kpi5 = 1 :  $kpi5 = 0;

                $kpi13 = $cond3;
=======
                $needItemsCount = $player->items()->leftJoin('itemtype', 'itemtype.PK_ItemType','=','item.FK_ItemType')->limit(5)->where('itemtype.IsImportant', 1)->count();
                ($needItemsCount > 3)? $kpi1 = 1 : $kpi1 = 0;
                ($needItemsCount > 4)? $kpi3 = 1 : $kpi3 = 0;

                /////
                $totalNeedItems = [];
                foreach ($player->items()->leftJoin('itemtype', 'itemtype.PK_ItemType','=','item.FK_ItemType')
                             ->where('itemtype.IsImportant', 1)->get() as $item){
                    array_push($totalNeedItems , $item->pivot->ItemDisplayedPrice);
                }

                $totalWantItems = [];
                foreach ($player->items()->leftJoin('itemtype', 'itemtype.PK_ItemType','=','item.FK_ItemType')
                             ->where('itemtype.IsImportant', 0)->get() as $item){
                    array_push($totalWantItems , $item->pivot->ItemDisplayedPrice);
                }

                $kpi4 =  array_sum($totalNeedItems) > 0 ? (array_sum($totalWantItems)/ array_sum($totalNeedItems))*100 : 0;

                ////
                $cond1 = $player->Income > 0 ? ($player->CharityPoints / $player->Income)*100 : 0;
                $cond2 = $player->Income > 0 ? ($player->DsiplayedPrice / $player->Income)*100 : 0;
                $cond3 = $player->Income > 0 ? ($player->Money / $player->Income)*100 : 0;
                (($cond1 >= 60  && $cond1 <= 80) || ($cond2 > 10 && $cond2 <= 40) ||  ($cond3 > 10 && $cond3<= 40)) ? $kpi5 = 1 :  $kpi5 = 0;
>>>>>>> Stashed changes

                ($player->InvestmentReturn > 0) ? $kpi9 = 1 : $kpi9 = 0;
<<<<<<< Updated upstream
//                ($player->items->count() > 8 && ($cond3 >= 5 && $cond3 < 20 )) ? $kpi12 = 1 : $kpi12 = 0;

                $charityValue = [];
                $charityMoneyBefore = [];

                foreach ( $player->charities()->get() as $charity){
                    array_push($charityValue , $charity->Value);
                    array_push($charityMoneyBefore , $charity->pivot->MoneyBefore);
                }

                $kpi17 = (array_sum($charityMoneyBefore) > 0) ? (array_sum($charityValue)/array_sum($charityMoneyBefore))*100 : 0;

                ($player->items->count() >= 7 && ($cond2 >= 8 && $cond2 <= 15 ) && ($cond3 >= 10)) ? $kpi18 = 1 : $kpi18 = 0;
=======
                ($player->items->count() > 8 && ($cond3 >= 5 && $cond3 < 20 )) ? $kpi12 = 1 : $kpi12 = 0;
                ($player->items->count() >= 7 && ($cond1 >= 8 && $cond1 < 15 )) ? $kpi18 = 1 : $kpi18 = 0;
>>>>>>> Stashed changes

                $playerKPi = PlayerKpis::where('FK_player_id', $player->PK_Player)->first();
                if ($playerKPi){
                    $playerKPi->update(
                        ['FK_player_id' => $player->PK_Player ,
                            'kpi1' => $kpi1 ,
<<<<<<< Updated upstream
                            'kpi2' => $kpi2 ,
=======
>>>>>>> Stashed changes
                            'kpi3' => $kpi3 ,
                            'kpi4' =>$kpi4 ,
                            'kpi5' =>$kpi5 ,
                            'kpi9' =>$kpi9,
<<<<<<< Updated upstream
                            'kpi13' =>$kpi13,
                            'kpi17' =>$kpi17,
                            'kpi18' =>$kpi18,
                            'kpi21' =>$kpi21,
=======
                            'kpi12' =>$kpi12,
                            'kpi18' =>$kpi18,
>>>>>>> Stashed changes
                        ]);
                }else{
                    $playerKPi =  PlayerKpis::create(
                        ['FK_player_id' => $player->PK_Player ,
                            'kpi1' => $kpi1 ,
<<<<<<< Updated upstream
                            'kpi2' => $kpi2 ,
=======
>>>>>>> Stashed changes
                            'kpi3' => $kpi3 ,
                            'kpi4' =>$kpi4  ,
                            'kpi5' =>$kpi5 ,
                            'kpi9' =>$kpi9 ,
<<<<<<< Updated upstream
                            'kpi13' =>$kpi13,
                            'kpi17' =>$kpi17,
                            'kpi18' =>$kpi18,
                            'kpi21' =>$kpi21,
=======
                            'kpi12' =>$kpi12 ,
                            'kpi18' =>$kpi18,
>>>>>>> Stashed changes
                        ]);
                }

                return response($playerKPi);
            }
        }
    }
}

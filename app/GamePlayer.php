<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GamePlayer extends Model
{
    public $timestamps = false;
    protected $table = 'GamePlayer';
    protected $guarded = [];

    public function charities(){
        return $this->belongsToMany(Charity::class , 'Player_Charity', 'FK_Player','FK_Charity','PK_Player','PK_Charity')
            ->withPivot('MoneyBefore','WalletBefore');
    }

    public function items(){
        return $this->belongsToMany(Item::class , 'Player_Item', 'FK_Player','FK_Item','PK_Player','PK_Item')
            ->withPivot('MoneyBefore','ItemDisplayedPrice','WalletBefore','PriceMultiplier','FK_CellIndex');
    }

    public function plans(){
        return $this->belongsToMany(Item::class , 'Player_plan', 'FK_Player','FK_Item','PK_Player','PK_Item');
    }

    public function kpis(){
        if (PlayerKpis::where('FK_player_id', $this->PK_Player)->count() == 0){
            $this->ResolveKpi($this->PK_Player);
        }
        return $this->hasOne(PlayerKpis::class , 'FK_player_id','PK_Player');
    }

    public function ResolveKpi($player_id){
        $player = Player::where('PK_Player', $player_id)->first();
        if ($player){
            if ($player->items){

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

                $kpi4 = array_sum($totalNeedItems)? (array_sum($totalWantItems)/ array_sum($totalNeedItems))*100 : 0;

                ////
                $cond1 = $player->Income? (array_sum($totalDisplayPrice) / $player->Income)*100 : 0;
                $cond2 = $player->Income ? ($player->CharityPoints / $player->Income)*100 : 0;
                $cond3 = $player->Income? ($player->Money / $player->Income)*100: 0;
                (($cond1 >= 60  && $cond1 <= 80) || ($cond2 > 10 && $cond2 <= 40) ||  ($cond3 > 10 && $cond3<= 40)) ? $kpi5 = 1 :  $kpi5 = 0;

                $kpi13 = $cond3;

                ///

                ($player->InvestmentReturn > 0) ? $kpi9 = 1 : $kpi9 = 0;
//                ($player->items->count() > 8 && ($cond3 >= 5 && $cond3 < 20 )) ? $kpi12 = 1 : $kpi12 = 0;

                $charityValue = [];
                $charityMoneyBefore = [];

                foreach ( $player->charities()->get() as $charity){
                    array_push($charityValue , $charity->Value);
                    array_push($charityMoneyBefore , $charity->pivot->MoneyBefore);
                }

                $kpi17 = (array_sum($charityMoneyBefore) > 0) ? (array_sum($charityValue)/array_sum($charityMoneyBefore))*100 : 0;

                ($player->items->count() >= 7 && ($cond2 >= 8 && $cond2 <= 15 ) && ($cond3 >= 10)) ? $kpi18 = 1 : $kpi18 = 0;

                $playerKPi = PlayerKpis::where('FK_player_id', $player->PK_Player)->first();
                if ($playerKPi){
                    $playerKPi->update(
                        ['FK_player_id' => $player->PK_Player ,
                            'kpi1' => $kpi1 ,
                            'kpi2' => $kpi2 ,
                            'kpi3' => $kpi3 ,
                            'kpi4' =>$kpi4 ,
                            'kpi5' =>$kpi5 ,
                            'kpi9' =>$kpi9,
                            'kpi13' =>$kpi13,
                            'kpi17' =>$kpi17,
                            'kpi18' =>$kpi18,
                        ]);
                }else{
                    $playerKPi =  PlayerKpis::create(
                        ['FK_player_id' => $player->PK_Player ,
                            'kpi1' => $kpi1 ,
                            'kpi2' => $kpi2 ,
                            'kpi3' => $kpi3 ,
                            'kpi4' =>$kpi4  ,
                            'kpi5' =>$kpi5 ,
                            'kpi9' =>$kpi9 ,
                            'kpi13' =>$kpi13,
                            'kpi17' =>$kpi17,
                            'kpi18' =>$kpi18,
                        ]);
                }

                return response($playerKPi);
            }
        }
    }
}

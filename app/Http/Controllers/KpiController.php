<?php

namespace App\Http\Controllers;

use App\Player;
use App\PlayerKpis;
use Illuminate\Http\Request;

class KpiController extends Controller
{

    public function index(Request $request, $player_id)
    {

        $player = Player::where('PK_Player', $player_id)->first();
        if ($player) {
            if ($player->items) {

                $needItemsCount = $player->items()->leftJoin('ItemType', 'ItemType.PK_ItemType', '=', 'Item.FK_ItemType')->OrderBy('FK_CellIndex')->limit(5)->where('ItemType.IsImportant', 1)->count();

                ($needItemsCount >= 3) ? $kpi1 = 1 : $kpi1 = 0;
                ($needItemsCount >= 4) ? $kpi3 = 1 : $kpi3 = 0;

                /////
                $totalNeedItems = [];
                foreach ($player->items()->leftJoin('ItemType', 'ItemType.PK_ItemType', '=', 'Item.FK_ItemType')
                             ->where('ItemType.IsImportant', 1)->get() as $item) {
                    array_push($totalNeedItems, $item->pivot->ItemDisplayedPrice);
                }

                $cond4 = ($player->items()
                        ->leftJoin('ItemType', 'ItemType.PK_ItemType', '=', 'Item.FK_ItemType')
                        ->where('FK_CellIndex', '<=', 5)
                        ->where('ItemType.PK_ItemType', 7)->count() > 0);

                $cond4 ? $kpi2 = 1 : $kpi2 = 0;

                $totalWantItems = [];
                foreach ($player->items()->leftJoin('ItemType', 'ItemType.PK_ItemType', '=', 'Item.FK_ItemType')
                             ->where('ItemType.IsImportant', 0)->get() as $item) {
                    array_push($totalWantItems, $item->pivot->ItemDisplayedPrice);
                }

                $totalDisplayPrice = [];
                foreach ($player->items()->leftJoin('ItemType', 'ItemType.PK_ItemType', '=', 'Item.FK_ItemType')->get() as $item) {
                    array_push($totalDisplayPrice, $item->pivot->ItemDisplayedPrice);
                }

                $count = $player->items()->whereIn('Item.PK_Item', [19, 20])->count();
                ($count > 0) ? $kpi21 = 1 : $kpi21 = 0;

                $count = $player->items()->whereIn('Item.PK_Item', [17, 18, 19, 20])->count();
                ($count > 0) ? $kpi22 = 1 : $kpi22 = 0;

                $kpi4 = array_sum($totalNeedItems) ? (array_sum($totalWantItems) / array_sum($totalNeedItems)) * 100 : 0;

                ////
                $cond1 = $player->Income ? (array_sum($totalDisplayPrice) / $player->Income) * 100 : 0;
                $cond2 = $player->Income ? ($player->CharityPoints / $player->Income) * 100 : 0;
                $cond3 = $player->Income ? ($player->Money / $player->Income) * 100 : 0;
                (($cond1 >= 60 && $cond1 <= 80) || ($cond2 > 10 && $cond2 <= 40) || ($cond3 > 10 && $cond3 <= 40)) ? $kpi5 = 1 : $kpi5 = 0;

                $kpi13 = $cond3;

                ($player->InvestmentReturn > 0) ? $kpi9 = 1 : $kpi9 = 0;
//                ($player->items->count() > 8 && ($cond3 >= 5 && $cond3 < 20 )) ? $kpi12 = 1 : $kpi12 = 0;

                $charityValue = [];
                $charityMoneyBefore = [];

                foreach ($player->charities()->get() as $charity) {
                    array_push($charityValue, $charity->Value);
                    array_push($charityMoneyBefore, $charity->pivot->MoneyBefore);
                }

                $kpi17 = (array_sum($charityMoneyBefore) > 0) ? (array_sum($charityValue) / array_sum($charityMoneyBefore)) * 100 : 0;

                ($player->items->count() >= 7 && ($cond2 >= 8 && $cond2 <= 15) && ($cond3 >= 10)) ? $kpi18 = 1 : $kpi18 = 0;

                $playerKPi = PlayerKpis::where('FK_player_id', $player->PK_Player)->first();
                if ($playerKPi) {
                    $playerKPi->update(
                        ['FK_player_id' => $player->PK_Player,
                            'kpi1' => $kpi1,
                            'kpi2' => $kpi2,
                            'kpi3' => $kpi3,
                            'kpi4' => $kpi4,
                            'kpi5' => $kpi5,
                            'kpi9' => $kpi9,
                            'kpi13' => $kpi13,
                            'kpi17' => $kpi17,
                            'kpi18' => $kpi18,
                            'kpi21' => $kpi21,
                            'kpi22' => $kpi22,
                        ]);
                } else {
                    $playerKPi = PlayerKpis::create(
                        ['FK_player_id' => $player->PK_Player,
                            'kpi1' => $kpi1,
                            'kpi2' => $kpi2,
                            'kpi3' => $kpi3,
                            'kpi4' => $kpi4,
                            'kpi5' => $kpi5,
                            'kpi9' => $kpi9,
                            'kpi13' => $kpi13,
                            'kpi17' => $kpi17,
                            'kpi18' => $kpi18,
                            'kpi21' => $kpi21,
                            'kpi22' => $kpi22,
                        ]);
                }

                return response($playerKPi);
            }
        }

    }

    public function statistics(Request $request)
    {
        PlayerKpis::Resolve();

        $total = PlayerKpis::count();
        $state1 = round(PlayerKpis::sum('kpi13') / $total);
        $state2 = PlayerKpis::where('kpi1', 1)->count();
        $state3 = PlayerKpis::where('kpi3', 1)->count();
        $state4 = round(PlayerKpis::sum('kpi4') / $total);
        $state5 = PlayerKpis::where('kpi5', 1)->count();
        $state6 = PlayerKpis::where('kpi9', 1)->count();
        $state7 = round(PlayerKpis::sum('kpi17') / $total);
        $state8 = PlayerKpis::where('kpi18', 1)->count();
        $state9 = PlayerKpis::where('kpi22', 1)->count();
        $state10 = PlayerKpis::where('kpi21', 1)->count();

        $scraper = new \App\Scraper();
        $android = (object)$scraper->getApp('com.MeemEein.MalyMultiplayer');
        $json = file_get_contents("https://appmagic.rocks/api/v1/applications/2/1530905389");
        $iOS = json_decode($json);

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

        return view('statistics', compact('statistics', 'total','iOS','android'));

    }


    public function getToken(Request $request)
    {
        dd($request->token);
    }

    public function resetPassword(Request $request)
    {
        $token = $request->token;
        return view('reset-password', compact('token'));
    }
}

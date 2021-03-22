<?php

namespace App\Http\Controllers;

use App\Cell;
use App\Charity;
use App\GamePlayer;
use App\Item;
use App\Player;

use Illuminate\Http\Request;

class PlayerController extends Controller
{
    //

      public function index(Request $request){
       $players = GamePlayer::orderBy('PK_Player','DESC')->limit(30)
           ->get()->transform(function ($player){
               $player->items;
               $player->charities;
               $player->kpis;
               $player->plans;
               return [
                   'player' => $player,
                //   'items' => $player->items,
                //   'charities' => $player->charities,
                //   'kpi' => $player->kpis,
               ];
           });

         return response($players);
    }

    public function save(Request $request)
    {

        //  return response(['player' => $request->PlannedItems]);
        $player = new GamePlayer();
        $player->fill($request->except('items', 'charities','PlannedItems'));
        $player->save();

        if ($request->has('items') && $player) {
            $items = [];
            foreach ($request->items as  $item) {
                $item = (object) $item;
                $CellIndex = Cell::where('Name',$item->buyingCellIndex)->first();
                $MoneyBefore = $item->moneyBefore;
                 $WalletBefore = $item->WalletBefore;
                foreach ($item->itemsBought  as $innerItem ){
                    $innerItem = (object) $innerItem;
                   $subItem = Item::where('Name', $innerItem->itemName)->first();
                    $items[$subItem->PK_Item] = [
                        'FK_Player' => $player->id,
                        'MoneyBefore' => $MoneyBefore,
                         'WalletBefore' => $WalletBefore,
                        'ItemDisplayedPrice' => $innerItem->itemDisplayedPrice,
                        'PriceMultiplier' => $innerItem->priceMultiplier,
                        'FK_CellIndex' => $CellIndex->PK_Cell,
                    ];
                }
            }
            $player->items()->sync($items);

        }
        if ($request->has('charities')) {
            $charities = [];
            foreach ($request->charities as $charity) {
                $charity = (object) $charity;
                $innCharity = Charity::where('Value', $charity->donationValue)->first();
                $CellIndex = Cell::where('Name',$charity->charityCellIndex)->first();
                $charities[$innCharity->PK_Charity] = [
                     'FK_Player' => $player->id,
                    'MoneyBefore' => $charity->moneyBefore,
                    'WalletBefore' => $charity->WalletBefore,
                    'FK_CellIndex' => $CellIndex->PK_Cell,
                ];
            }
            $player->charities()->sync($charities);
        }

         if ($request->has('PlannedItems')) {
            $plans = [];
            foreach ($request->PlannedItems as $plan) {
                if($plan != ""){
                  $innPlan = Item::where('Name', $plan)->first();
                 $plans[$innPlan->PK_Item] = ['FK_Player' => $player->id];
                }
            }
            $player->plans()->sync($plans);
        }

        return response(['player' => $player]);
    }
}

<?php

namespace App\Http\Controllers;

use App\Cell;
use App\Charity;
use App\Item;
use App\Player;
use Illuminate\Http\Request;

class PlayerController extends Controller
{
    //

    public function index(){
       $players = Player::orderBy('PK_Player')->limit(100)
           ->get()->transform(function ($player){
               return [
                   'player' => $player,
                   'items' => $player->items,
                   'charities' => $player->charities,
                   'kpi' => $player->kpis,
               ];
           });

        return response($players);
    }


    public function save(Request $request)
    {
        $player = new Player();
        $player->fill($request->except('items', 'charities'));
        if ($request->has('items')) {
            $items = [];
            foreach ($request->items as  $item) {
                $item = (object) $item;
                $CellIndex = Cell::where('Name',$item->buyingCellIndex)->first();
                $MoneyBefore = $item->moneyBefore;
                foreach ($item->itemsBought  as $innerItem ){
                    $innerItem = (object) $innerItem;
                   $subItem = Item::where('Name', $innerItem->itemName)->first();
                    $items[$subItem->PK_Item] = [
                        'MoneyBefore' => $MoneyBefore,
                        'ItemDisplayedPrice' => $innerItem->itemDisplayedPrice,
                        'PriceMultiplier' => $innerItem->priceMultiplier,
                        'FK_CellIndex' => $CellIndex->PK_Cell,
                    ];
                }
            }
            $player->items->sync($items);
        }
        if ($request->has('charities')) {
            $charities = [];
            foreach ($request->charities as $charity) {
                $charity = (object) $charity;
                $innCharity = Charity::where('Value', $charity->donationValue)->first();
                $CellIndex = Cell::where('Name',$charity->charityCellIndex)->first();
                $charities[$innCharity->PK_Charity] = [
                    'MoneyBefore' => $charity->moneyBefore,
                    'FK_CellIndex' => $CellIndex->PK_Cell,
                ];
            }
            $player->charities->sync($charities);
        }

        return response(['player' => $player]);
    }
}

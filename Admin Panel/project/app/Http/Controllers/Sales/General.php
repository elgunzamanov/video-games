<?php

namespace App\Http\Controllers\Sales;

use App\Http\Controllers\Controller;
use App\Models\Games;
use App\Models\Sales;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class General extends Controller
{
    public function getSalesList() {
        $sales = Sales::all();
        $games = Games::all();
        View::share('sales', $sales);
        View::share('games', $games);
        return view('sales.list');
    }

    public function addSale(Request $request) {
        $request->validate([
            'add_product_info' => 'required',
        ]);

        $data = Sales::create([
            'game_id' => $request->add_game,
            'product_info' => $request->add_product_info,
            'stock' => $request->add_stock,
            'discount' => $request->discount,
            'status' => $request->add_status,
        ]);

        return redirect()->back()->with($data ? 'success' : 'error', true);
    }

    public function viewSale(Request $request) {
        $sale = Sales::find($request->id);
        $game = Games::where('id', $sale->game_id)->first();

        $data = [
            'sale' => $sale,
            'game' => $game
        ];

        if ($data) {
            return $data;
        }
        return 0;
    }

    public function editSale(Request $request) {
        $request->validate([
            'edit_product_info' => 'required',
        ]);

        $sale = Sales::find($request->edit_id);
        $game = Games::where('id', $sale->game_id)->first();

        $sale->product_info = $request->edit_product_info;
        $game->price = $request->edit_price;
        $sale->stock = $request->edit_stock;
        $sale->discount = $request->edit_discount;
        $sale->status = $request->edit_status;

        return redirect()->back()->with($sale->save() && $game->save() ? 'success' : 'error', true);
    }
}

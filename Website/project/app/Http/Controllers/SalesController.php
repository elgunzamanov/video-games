<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Games;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class SalesController extends Controller
{
    public function getSales() {
        $games = Games::all();
        View::share('games', $games);
        return view('sales');
    }
}

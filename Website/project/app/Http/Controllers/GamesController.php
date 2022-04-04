<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class GamesController extends Controller
{
    public function getGames() {
        return view('games');
    }
}

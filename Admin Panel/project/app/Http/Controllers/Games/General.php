<?php

namespace App\Http\Controllers\Games;

use App\Http\Controllers\Controller;
use App\Models\Categories;
use App\Models\Games;
use App\Models\Subcategories;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Str;

class General extends Controller
{
    public function getGamesList() {
        $games = Games::all();
        View::share('games', $games);
        return view('games.list');
    }

    public function newGame() {
        $subcategories = Subcategories::where('category_id', '1')->where('status', '1')->get();
        $categories = Categories::all();
        View::share('subcategories', $subcategories);
        View::share('categories', $categories);
        return view('games.add_game');
    }

    public function getSubcategories(Request $request) {
        $subcategories = Subcategories::where('category_id', $request->category)->where('status', '1')->get();
        if ($subcategories) {
            return $subcategories;
        }
        return 0;
    }

    public function addGame(Request $request) {
        $request->validate([
            'add_name' => 'required | max:255',
            'add_developers' => 'required | max:255',
            'add_publishers' => 'required | max:255',
            'add_series' => 'required | max:255',
            'add_engine' => 'required | max:255',
            'add_platforms' => 'required | max:255',
            'add_image' => 'required | image | mimes:jpg,jpeg,png | max:2048',
            'add_price' => 'required',
        ]);

        $game = new Games;
        $game->name = $request->add_name;
        $game->developers = $request->add_developers;
        $game->publishers = $request->add_publishers;
        $game->series = $request->add_series;
        $game->engine = $request->add_engine;
        $game->platforms = $request->add_platforms;
        $game->category_id = $request->add_category;
        $game->subcategory_id = $request->add_subcategory;
        $game->modes = $request->add_modes;
        $game->released_year = $request->add_released_year;
        $game->price = $request->add_price;
        $game->status = $request->game_add_active ? '1' : '0';

        if ($request->hasFile('add_image')) {
            $image = $request->file('add_image');
            $name = Str::slug($request->add_name).$image->getClientOriginalExtension();
            $directory = 'assets/media/games/';
            $image->move($directory, $name);
            $image_path = $directory.$name;
            $game->image = $image_path;
        }

        $game->save();
        return redirect()->back()->with($game ? 'success' : 'error', true);
    }

    public function getGame($id) {
        $game = Games::find($id);
        $subcategories = Subcategories::where('category_id', $game->category_id)->where('status', '1')->get();
        $categories = Categories::all();
        View::share('subcategories', $subcategories);
        View::share('categories', $categories);
        if ($game) {
            return view('games.edit_game', compact('game'));
        }
        return 0;
    }

    public function editGame(Request $request) {
        $request->validate([
            'edit_name' => 'required | max:255',
            'edit_developers' => 'required | max:255',
            'edit_publishers' => 'required | max:255',
            'edit_series' => 'required | max:255',
            'edit_engine' => 'required | max:255',
            'edit_platforms' => 'required | max:255',
            'edit_image' => 'nullable | image | mimes:jpg,jpeg,png | max:2048',
            'edit_price' => 'required',
        ]);

        $game = Games::find($request->edit_id);
        $game->name = $request->edit_name;
        $game->developers = $request->edit_developers;
        $game->publishers = $request->edit_publishers;
        $game->series = $request->edit_series;
        $game->engine = $request->edit_engine;
        $game->platforms = $request->edit_platforms;
        $game->category_id = $request->edit_category;
        $game->subcategory_id = $request->edit_subcategory;
        $game->modes = $request->edit_modes;
        $game->price = $request->edit_price;
        $game->status = $request->game_edit_active ? '1' : '0';

        if ($request->hasFile('edit_image')) {
            $image = $request->file('edit_image');
            $name = Str::slug($request->edit_name).'.'.$image->getClientOriginalExtension();
            $oldImage = $game->image;
            $directory = 'assets/media/games/';
            if (file_exists($oldImage)) {
                unlink($oldImage);
            }
            $image->move($directory, $name);
            $name = $directory.$name;
            $game->image = $name;
        }

        return redirect()->back()->with($game->save() ? 'success' : 'error', true);
    }
}

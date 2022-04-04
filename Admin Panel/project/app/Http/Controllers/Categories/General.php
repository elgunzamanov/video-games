<?php

namespace App\Http\Controllers\Categories;

use App\Http\Controllers\Controller;
use App\Models\Categories;
use App\Models\Subcategories;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class General extends Controller
{
    public function getCategoriesList() {
        $categories = Categories::all();
        $subcategories = Subcategories::all();
        View::share('subcategories', $subcategories);
        View::share('categories', $categories);
        return view('categories.list');
    }

    public function addCategory(Request $request) {
        $request->validate([
            'add_category' => 'required | min:3 | max:255',
        ]);

        $data = Categories::create([
            'category' => $request->add_category,
        ]);
        return redirect()->back()->with($data ? 'success' : 'error', true);
    }

    public function addSubcategory(Request $request) {
        $request->validate([
            'add_subcategory' => 'required | min:3 | max:255',
        ]);

        $data = Subcategories::create([
            'category_id' => $request->select_category,
            'subcategory' => $request->add_subcategory,
        ]);
        return redirect()->back()->with($data ? 'success' : 'error', true);
    }

    public function viewCategory(Request $request) {
        $subcategory = Subcategories::find($request->id);
        $category = Categories::where('id', $subcategory->category_id)->first();

        $data = [
            "subcategory" => $subcategory,
            "category" => $category
        ];

        if ($data) {
            return $data;
        }
        return 0;
    }

    public function editCategory(Request $request) {
        $subcategory = Subcategories::find($request->edit_id);
        $category = Categories::where('id', $subcategory->category_id)->first();

        $category->category = $request->edit_category;
        $subcategory->subcategory = $request->edit_subcategory;
        $subcategory->status = $request->edit_status;

        return redirect()->back()->with($subcategory->save() && $category->save() ? 'success' : 'error', true);
    }
}

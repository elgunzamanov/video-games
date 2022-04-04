<?php

namespace App\Http\Controllers\Orders;

use App\Http\Controllers\Controller;
use App\Models\Orders;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class General extends Controller
{
    public function getOrdersList() {
        $orders = Orders::all();
        View::share('orders', $orders);
        return view('orders.list');
    }

    public function viewProducts($id) {
        $order = Orders::find($id);
        if ($order) {
            return view('orders.products', compact('order'));
        }
        return 0;
    }
}

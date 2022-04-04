<?php

namespace App\Http\Controllers\General;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class General extends Controller
{
    public function index() {
        return view('index');
    }

    public static function GetRole() {
        $role = Auth::user()->roles;
        switch ($role) {
            case '1':
                return 'Super Admin';
            case '2':
                return 'Admin';
        }
    }
}

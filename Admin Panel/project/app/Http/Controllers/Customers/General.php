<?php

namespace App\Http\Controllers\Customers;

use App\Http\Controllers\Controller;
use App\Mail\SendMail;
use App\Models\Countries;
use App\Models\Customers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\View;

class General extends Controller
{
    public function getCustomersList() {
        $countries = Countries::all();
        $customers = Customers::all();
        View::share('countries', $countries);
        View::share('customers', $customers);
        return view('customers.list');
    }

    public function addCustomer(Request $request) {
        $request->validate([
            'add_name' => 'required | min:3 | max:255',
            'add_email' => 'required | min:3 | max:255',
            'add_phone' => 'required | max:50',
        ]);

        $data = Customers::create([
            'name' => $request->add_name,
            'email' => $request->add_email,
            'phone' => $request->add_phone,
            'country_id' => $request->add_country,
        ]);

        if ($data) {
            $mail = array(
                'title' => 'Video Games - New Customer',
                'name' => $request->add_name,
                'email' => strtolower($request->add_email),
                'view' => 'mails.new_customer'
            );
            Mail::to(strtolower($request->add_email))->send(new SendMail($mail));

            return redirect()->back()->with('success', true);
        }
        else {
            return redirect()->back()->with('false', true);
        }
    }

    public function viewCustomer(Request $request) {
        $data = Customers::find($request->id);
        if ($data) {
            return $data;
        }
        return 0;
    }

    public function editCustomer(Request $request) {
        $validated = $request->validate([
            'edit_name' => 'required | max:255',
            'edit_email' => 'required | max:255',
            'edit_phone' => 'required | max:50',
        ]);

        $customer = Customers::find($request->edit_id);

        $customer->name = $request->edit_name;
        $customer->email = $request->edit_email;
        $customer->phone = $request->edit_phone;
        $customer->country_id = $request->edit_country;

        return redirect()->back()->with($customer->save() ? 'success' : 'error', true);
    }
}

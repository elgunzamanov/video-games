<?php

namespace App\Http\Controllers\Users;

use App\Http\Controllers\Controller;
use App\Mail\SendMail;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Str;

class General extends Controller
{
    public function getProfile() {
        return view('users.profile');
    }

    public function editProfile(Request $request) {
        $user = User::find(Auth::user()->id);
        if ($request->hasFile('new_image')) {
            $request->validate([
                'new_image' => 'image | mimes:jpg,jpeg,png | max:1024'
            ]);

            $image = $request->file('new_image');
            $name = Str::slug($user->name).'-'.rand(1000, 9999).'.'.$image->getClientOriginalExtension();

            $oldImage = $user->image;
            $directory = 'assets/media/users/';
            if (file_exists($oldImage && $oldImage !== 'assets/media/users/avatar.jpg')) {
                unlink($oldImage);
            }

            $image->move($directory, $name);

            $pathname = $directory.$name;
            $user->image = $pathname;
        }

        if ($request->current_password) {
            $request->validate([
                'new_password' => 'required | min:3',
                'confirm_new_password' => 'required | min:3 | same:new_password'
            ]);

            if (Hash::check($request->current_password, $user->password)) {
                $password = Hash::make($request->new_password);
                $user->password = $password;
            }
            else {
                return redirect()->back()->with('error_password', true);
            }
        }

        return redirect()->back()->with($user->save() ? 'success' : 'error', true);
    }

    public function getUsersList() {
        $users = User::where('roles', '!=', '1')->get();
        View::share('users', $users);
        return view('users.list');
    }

    public function addUser(Request $request) {
        $request->validate([
            'add_name' => 'required | min:3 | max:255',
            'add_email' => 'required | email | unique:users,email',
            'add_position' => 'required | min:3 | max:100',
        ]);

        $password = Str::random(8);
        $data = User::create([
            'name' => $request->add_name,
            'email' => $request->add_email,
            'position' => $request->add_position,
            'roles' => $request->add_roles,
            'password' => Hash::make($password),
        ]);

        $mail = array(
            'title' => 'Video Games - New User',
            'name' => $request->add_name,
            'email' => strtolower($request->add_email),
            'password' => $password,
            'view' => 'mails.new_user'
        );
        Mail::to(strtolower($request->add_email))->send(new SendMail($mail));

        return redirect()->back()->with($data ? 'success' : 'error', true);
    }

    public function viewUser(Request $request) {
        $data = User::find($request->id);
        if ($data) {
            return $data;
        }
        return 0;
    }

    public function checkUserEmail(Request $request) {
        $check = User::where('email', $request->edit_email)->first();
        if ($check) {
            return $check;
        }
        return 0;
    }

    public function editUser(Request $request) {
        $request->validate([
            'edit_name' => 'required | min:3 | max:255',
            'edit_position' => 'required | min:3 | max:100',
            'edit_email' => 'required | email',
            'edit_password' => 'nullable | min:8',
        ]);

        $user = User::find($request->edit_id);
        $check = User::where('email', $request->edit_email)->where('email', '!=', $user->email)->first();
        if ($check) {
            return redirect()->back()->with('error_users_email', true);
        }

        $user->name = $request->edit_name;
        $user->position = $request->edit_position;
        $user->email = $request->edit_email;
        $user->roles = $request->edit_roles;
        $user->status = $request->edit_status;

        if ($request->edit_password) {
            $user->password = Hash::make($request->edit_password);

            $mail = array(
                'title' => 'Video Games - New Password',
                'name' => $request->edit_name,
                'email' => strtolower($request->edit_email),
                'password' => $request->edit_password,
                'view' => 'mails.new_password'
            );

            Mail::to(strtolower($request->edit_email))->send(new SendMail($mail));
        }

        return redirect()->back()->with($user->save() ? 'success' : 'error', true);
    }
}

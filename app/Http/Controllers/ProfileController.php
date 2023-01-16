<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use App\Models\User;
use App\Models\SocialAccount;
use Session;
use Cookie;

class ProfileController extends Controller
{
    public function profile() {
        return view('profile.profile');
    }

    public function profileEdit(Request $request)
    {
        return view('profile.editprofile');
    }

    public function profileUpdate(Request $request)
    {
        $request->validate([
            'name' => 'min:5|max:20',
            'email' => 'required|email|unique:users',
        ]);

        $user =Auth::user();
        $user->name = $request['name'];
        $user->email = $request['email'];
        $user->save();
        return redirect('/profile');
    }

    public function changePassword(Request $request)
    {
        return view('profile.editpassword');
    }

    public function changePasswordSave(Request $request)
    {

        $this->validate($request, [
            'current_password' => 'required|min:5|max:20',
            'new_password' => 'required|confirmed|min:5|max:20'
        ]);
        $auth = Auth::user();

        if (!Hash::check($request->get('current_password'), $auth->password))
        {
            return back()->with('error', "Current Password is Invalid");
        }

        if (strcmp($request->get('current_password'), $request->new_password) == 0)
        {
            return redirect()->back()->with("error", "New Password cannot be same as your current password.");
        }

        $user =  User::find($auth->id);
        $user->password =  Hash::make($request->new_password);
        $user->save();
        return back()->with('success', "Password Changed Successfully");
    }
}

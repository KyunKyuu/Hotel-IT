<?php

namespace App\Http\Controllers\Account;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Hash;
class PasswordController extends Controller
{
    public function edit_tamu()
    {
    	return view('site/profile/edit_password');
    }

    public function update_tamu(Request $request)
    {
    	$request->validate([
    		'old_password' => 'required',
    		'password' => ['required', 'min:6', 'confirmed'],
    	]);

    	$currentPassword = auth()->user()->password;
    	$old_password = request('old_password');
    	if (Hash::check($old_password, $currentPassword)) {
    		auth()->user()->update([
    			'password' => bcrypt(request('password')),
    		]);

    		return back()->with('success', 'Password Berhasil Diubah');

    	} else {
    		return back()->withErrors(['old_password' => 'Pastikan Password yang dimasukan sesuai']);
    	}
    }
}

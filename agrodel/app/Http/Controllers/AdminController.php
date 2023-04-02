<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        return view('admin.enter');
    }

    public function auth(Request $request)
    {
    	if ($request->input('pass') == "123")
    	{
    		$pass = $request->input()['pass'];
    		session(['pass' => $pass]);
		    return redirect()->route('admin.index');
    	} else{
    		return back()
                ->withErrors(['msg' => 'Пароль не верный']);
    	}
    }

    public function exit() {
    	session()->forget('pass');
    	return redirect()->route('products.index');
    }

}

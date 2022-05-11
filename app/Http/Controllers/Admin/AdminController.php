<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
class AdminController extends Controller
{
    function index(){
        dd(parent::getC());
        return view('admin.home');
    }

    function check(Request $request){
        $request->validate(
                ["email"=>"required|email|exists:admins,email","password"=>"required|min:5|max:30"],
                ['email.exists'=>'This Email Does not Exist in Admins Table']
                );
        if( Auth::guard('admin')->attempt($request->only('email','password'),$request->filled('remember')) )
                  return redirect()->route('admin.home')->with('success','Hello Admin - Your Credentails Is Correct');
        else
                  return redirect()->back()->with('fail','incorrect credentails Because This Email Exists in Users Table but does not correspond with entered password');//go to the same page [dashboard.user.register]
}

function logout(){
   $name=Auth::guard('admin')->user()->name;
    Auth::guard('admin')->logout();
    return redirect("/")->with("Bye","Bye ".$name);
}
}

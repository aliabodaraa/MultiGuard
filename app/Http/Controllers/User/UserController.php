<?php

namespace App\Http\Controllers\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    function create(Request $request){
      $rules=[
         "name"=>"required|min:4",
         "email"=>"required|email|unique:users,email",
         "password"=>"required|min:5|max:30",
         "confirmPassword"=>"required|same:password|min:5|max:30",
     ];
     $this->validate($request,$rules);
     //dd($validate);
             $create=User::create([
            'name'=> $request->name,
            'email'=> $request->email,
            'password' => Hash::make($request['password']),
            'confirmPassword' => Hash::make($request->get('password'))
         ]);
        //  dd($create);
             if($create)
                 return redirect()->route('user.home')->with("success","User succussfully Creates.");
             else
                 return redirect()->back()->with("fail","Try to Create this User Again.");

}
function check(Request $request){
   $this->validate(
   $request,
   ["email"=>"required|email|exists:users,email","password"=>"required|min:5|max:30"],
   ['email.exists'=>'This Email Does not Exist in Users Table']
   );
    $cerds = $request->only('email','password');
    if( Auth::guard('web')->attempt($cerds) ){
        return redirect()->route('user.home')->with('success','correct credentails');
    }else{
        return redirect()->back()->with('fail','incorrect credentails Because This Email Exists in Users Table but does not correspond with entered password');//go to the same page [dashboard.user.register]
    }
}
function logout(){
    $name=Auth::guard('web')->user()->name;
    Auth::guard('web')->logout();
    //dd(Auth::user()->name);//UnKnown After logout
    //Auth::login(auth()->user());
    return redirect("/")->with("Bye","Bye ".$name);
}
};

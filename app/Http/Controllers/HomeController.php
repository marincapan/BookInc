<?php

namespace App\Http\Controllers;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }
    public function profile()
    {
        return view('user.profile');
    }
    public function change_profile(Request $request)
    {
        $user = User::find(auth()->user()->id);
        if ($request["name"]!="" && $request["name"]!=auth()->user()->name) $user->name = $request["name"];
        if ($request["email"]!="" && $request["email"]!=auth()->user()->email) $user->email = $request["email"];
        if ($request["password"]!="" && $request["password"]==$request["password_confirmation"]){
            $user->password = Hash::make($request['password']);
            $user->save();
            return redirect("profile")->with('status', 'Profile updated!');
        }else if ($request["password"]==""){
            $user->save();
            return redirect("profile")->with('status', 'Profile updated!');
        }else{
            $user->save();
            return redirect("profile")->with('status', "Profile updated but Password wasn't changed because enter values didn't match!");
        }
        
    }
}

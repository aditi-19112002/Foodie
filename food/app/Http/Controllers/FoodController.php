<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Food;
use App\Models\User;
use Illuminate\Support\Facades\Auth;


class FoodController extends Controller
{
    public function index()
    {
        $data['foods'] = Food::all();
        $data['user'] = Auth::user(); 
        return view("home", $data);
    }

    public function insert(Request $req)
    {
        if ($req->isMethod("post")) {
            $data = $req->validate([
                'name' => 'required',
                'category' => 'required',
                'isveg' => 'required',
                'price' => 'required',
                'image' => 'required'

            ]);
           
            $filename = $req->file("image")->getClientOriginalName();
            $path = $req->file("image")->storeAs("public/students", $filename);

            $data['image'] = $filename;

            $done = Food::create($data);
            return redirect()->route('home')->with('success', 'Food inserted successfully');
        }
        return view("insert");
    }
    public function login(Request $req){
        if($req->isMethod("post")){
            $data=$req->validate([
                "email"=>"required",
                "password"=>"required",

            ]);
            if(Auth::attempt($data)){
                return redirect()->route("home")->with("success","login successfully");
            }
            else{
                return redirect()->back()->with("error", "Email or password invalid");

            }
          
        }
        return view("login");
    }
    Public function signup(Request $request){
        if ($request->isMethod("post")){
        $data = $request->validate([
            "email"=>"required",
            "password"=>"required",
            "name"=>"required",
        ]);
        $data["password"] = bcrypt($data["password"]);
        $user = User::create($data);
        return redirect()->route('login')->with('success', 'User registered successfully');
    }
    return view ("signup");
    }
    public function logout(Request $req){
        Auth::logout();
        return redirect()->route("login");
    }
}
 
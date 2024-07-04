<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Models\Food; 

class AdminController extends Controller
{
    public function dashboard() 
{
    $totalFood = Food::count();
    $totalVeg = Food::where('isveg', true)->count();

    return view('admin.dashboard', compact('totalFood', 'totalVeg'));
}

    public function manageProducts()
    {
        $products = Food::all(); 
        
        return view('admin.manage-product', compact('products'));
    }

    public function deleteProduct($id)
{
    $product = Food::find($id);
    $product->delete();
    return redirect()->route('admin.manage-  products')->with('success', 'Product deleted successfully');

}
public function login(Request $req)
{
    if ($req->isMethod("post")) {
        $data = $req->validate([
            "email" => "required",
            "password" => "required",
        ]);

        if (Auth::guard('admin')->attempt($data)) {
            return redirect()->route('admin.dashboard')->with("success","Admin login successfully");
        } else {
            return back()->with("error", "Username and password are incorrect");
        }
    }

    return view("admin.adminLogin");
}
public function logout(Request $req){
    Auth::guard("admin")->logout();
    return redirect()->route('adminlogin')->with("error","Admin logout successfully");
}

}

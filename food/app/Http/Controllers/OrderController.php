<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Food;
use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Support\Facades\Auth;



class OrderController extends Controller
{


  Public function addToCart(Request $request,$id){
    $Food = Food::find($id);
    $user = Auth::user();

    if($Food){
      $order = Order::where([["status",false], ["user_id",$user->id]])->first();

      if($order){
        $orderItem =OrderItem::where("status",false)->where("Food_id",$id)->first();
        if($orderItem){
          //if orderitem already in a cart
          $orderItem->qty +=1;
          $orderItem->save();
        }
        else{
          $oi = new OrderItem();
          $oi->status = false;
          $oi->Food_id = $id;
          $oi->order_id = $order->id;
          $oi->save();
        }
      }
      else{
        //if order not exist in cart
        $o = new Order();
        $o->user_id =$user->id;
        $o->status = false;
        $o->save();
      }
      //need to change with cart page
      return redirect()->route('cart')->with("success","product added successfully");
    }
    else{
      return redirect()->route('home')->with("error","product not found");
    }
  }
  
  Public function removeFromCart(Request $request,$id){
    $Food = Food::find($id);
    $user = Auth::user();

    if($Food){
      $order = Order::where([["status",false], ["user_id",$user->id]])->first();

      if($order){
        $orderItem =OrderItem::where("status",false)->where("Food_id",$id)->first();
        if($orderItem){
         if( $orderItem->qty<1){
          $orderItem->qty -=1;
          $orderItem->save();
         }
         else{
          $orderItem->delete();
         }
        
        }
      
       
      }
      
    
      return redirect()->route('cart')->with("success","product update successfully");
    }
    else{
      return redirect()->route('home')->with("error","product not found");
    }
  }
  public function cart(){
    $data['order'] = Order::where([["user_id",Auth::id()],["status",false]])->first();
    return view("cart",$data);
  }
}
<?php

namespace App\Http\Controllers;

// // // use App\Models\Cart;

use App\Models\Cart;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class cartController extends Controller
{
    public function cartPage(){
        $cart = Auth::user()->usercarts;

        return view('myCartItems')->with(['cart' => $cart]);
    }

    public function addCart(Request $r){
        $details = new Cart();
        $details->CartID = Auth::user()->usercarts->id;
        $details->quantity = $r->quantity;

        $details->ItemID = $r->productID;

        $details->created_at = Carbon::now();
        $details->updated_at = Carbon::now();

        $details->save();

        return back()->with("status", "Add to Cart Successfully!");
    }

    public function updateCart($cartID) {
        $product = Cart::find($cartID)->products;

        return view('updateCart', ['product' => $product, 'id' => $cartID]);
    }

    public function update(Request $r) {
        $cart = Cart::find($r->id);
        $cart->quantity = $r->quantity;
        $cart->save();

        return back()->with("status", "Quantity Updated Successfully!");
    }

    public function removeProduct($productID){
        $carts = Cart::find($productID);

        $carts->delete();

        return back()->with("status", "Product Removed from Cart!");
    }


}

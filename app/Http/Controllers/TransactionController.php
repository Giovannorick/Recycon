<?php

namespace App\Http\Controllers;

use App\Models\Detail;
use App\Models\Transaction;
use App\Models\UserCart;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class TransactionController extends Controller
{
    public function transactionHistoryPage(){
        $transactions = Auth::user()->transactions;

        return view('transactionHistory')->with(['transactions' => $transactions]);
    }

    public function checkout(Request $r) {
        $validate = Validator::make($r->all(), ['address'=>'required']);
        if($validate->fails()) {
            return back()->withErrors($validate);
        }else {
            $transaction = new Transaction();
            $transaction->UserID = Auth::user()->id;
            $transaction->address = $r->address;
            $transaction->name = $r->name;
            $transaction->save();

            foreach (Auth::user()->usercarts->cart as $c) {
                $detail = new Detail();
                $detail->TransactionID = $transaction->id;
                $detail->ItemID = $c->ItemID;
                $detail->quantity = $c->quantity;
                $detail->save();
                $c->delete();
            }

            Auth::user()->usercarts  = new UserCart();

            return back()->with("status", "Checkout Finished Successfully!");
        }
    }
}

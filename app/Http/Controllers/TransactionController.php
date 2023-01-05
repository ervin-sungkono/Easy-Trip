<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Transaction;
use App\Models\TransactionDetail;

class TransactionController extends Controller
{
    public function index(){
        $transactions = Auth::user()->transactions;
        return view('transaction.index', compact('transactions'));
    }

    public function store(Request $request){
        if(!$request->terms_check){
            return redirect()->route('cart.index');
        }

        $transaction = Transaction::create([
            'user_id' => Auth::user()->id
        ]);
        $carts = Auth::user()->cart->details;
        foreach($carts as $cart){
            $transDetail = TransactionDetail::create([
                'transaction_id' => $transaction->id,
                'item_id' => $cart->item_id,
                'ticket_date' => $cart->ticket_date,
                'quantity' => $cart->quantity,
            ]);
            if(!$transDetail){
                $transaction->delete();
                return redirect()->route('cart.detail')->with('fail','Pembayaran gagal');
            }else{
                $cart->delete();
            }
        }
        return redirect()->route('transaction.index')->with('success','Pembayaran berhasil!');
    }
}

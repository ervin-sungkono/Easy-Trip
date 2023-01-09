<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Cart;
use App\Models\CartDetail;
use App\Http\Requests\CartRequest;

class CartController extends Controller
{
    public function store(CartRequest $request){
        $validated = $request->validated();
        $cart = Cart::firstOrNew([
            'user_id' => Auth::user()->id
        ]);
        $cart->save();
        $cartDetail = CartDetail::updateOrCreate([
            'cart_id' => $cart->id,
            'item_id' => $request->item_id,
            'ticket_date' => $validated['ticket_date']
        ],[
            'quantity' => $validated['quantity']
        ]);
        $status = ($cartDetail->wasRecentlyCreated) ? 'Berhasil menambahkan barang ke pesanan' : 'Pesanan berhasil diubah';

        return redirect()->route('product.detail', ['id' => $request->item_id])->with('status', $status);
    }

    public function index(){
        $cart = Cart::firstOrNew([
            'user_id' => Auth::user()->id
        ]);
        $carts = $cart->details;
        return view('cart.index', compact('carts'));
    }

    public function showForm($id){
        $cart = CartDetail::findOrFail($id);
        return view('cart.edit', compact('cart'));
    }

    public function update($id, CartRequest $request){
        $validated = $request->validated();

        $cart = CartDetail::findOrFail($id)->update([
            'ticket_date' => $validated['ticket_date'],
            'quantity' => $validated['quantity']
        ]);

        if($cart)
        return redirect()->route('cart.index')->with('success', 'Berhasil mengubah keranjang');

        else
        return redirect()->route('cart.index')->with('fail', 'Gagal mengubah keranjang');
    }

    public function delete($id){
        $cart = CartDetail::findOrFail($id);

        if($cart->delete())
        return redirect()->route('cart.index')->with('success', 'Berhasil menghapus keranjang');

        else
        return redirect()->route('cart.index')->with('fail', 'Gagal menghapus keranjang');
    }
}

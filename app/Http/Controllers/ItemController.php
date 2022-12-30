<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Item;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ItemController extends Controller
{
    public function index(){
        $items = Item::paginate(8);
        return view('home', compact('items'));
    }

    public function showForm(){
        return view('item.create');
    }

    public function search(Request $request){
        $text = $request->q;
        $items = Item::where('name','LIKE',"%{$text}%")->paginate(8);
        return view('search', compact('items'))->with('q', $request->q);
    }

    public function viewDetail($id){
        $item = Item::findOrFail($id);
        return view('item.detail', compact('item'));
    }

    public function store(ItemRequest $request){
        $validated = $request->validated();

        $file = $request->file('image');
        $name = $file->getClientOriginalName();
        $filename = now()->timestamp.'_'.$name;

        $imageUrl = Storage::disk('public')->putFileAs('images', $file, $filename);
        $item = Item::create([
            'itemName' => $validated['name'],
            'itemDescription' => $validated['description'],
            'image' => $imageUrl,
            'location' => $validated['location'],
            'status' => $validated['status'],
            'price' => $validated['price']
        ]);
        return redirect()->route('item.create')->with('status', $item ? 'Item added successfully!' : 'Fail to add item!');
    }

    public function delete($id){
        $item = Item::findOrFail($id);

        Storage::disk('public')->delete($item->imageUrl);
        $item->delete();
        $carts = Cart::where('itemID', '=', $id);
        $carts->delete();

        return redirect()->route('home')->with('success','Item deleted successfully!');
    }
}

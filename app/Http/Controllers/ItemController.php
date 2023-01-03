<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Item;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\ItemRequest;

class ItemController extends Controller
{
    public function index(Request $request){
        $query = $request->query('q');
        $loc = $request->query('loc');
        $items = Item::where('name', 'LIKE', "%{$query}%")
            ->where('location', 'LIKE', "%{$loc}%")
            ->paginate(20);
        return view('item.index', compact('items', 'query'));
    }

    public function showForm(){
        return view('item.create');
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
            'name' => $validated['name'],
            'description' => $validated['description'],
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
        $carts = Cart::where('item_id', '=', $id);
        $carts->delete();

        return redirect()->route('home')->with('success','Item deleted successfully!');
    }
}

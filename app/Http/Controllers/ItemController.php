<?php

namespace App\Http\Controllers;

use App\Models\CartDetail;
use App\Models\Item;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\ItemRequest;
use App\Http\Requests\UpdateItemRequest;

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

    public function edit($id){
        $item = Item::findOrFail($id);
        return view('item.edit', compact('item'));
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
        $filename = str_replace(" ", "", $name).'_'.now()->timestamp;

        $checked = $request->has('status') ? true : false;

        $imageUrl = Storage::disk('public')->putFileAs('images', $file, $filename);
        $item = Item::create([
            'name' => $validated['name'],
            'description' => $validated['description'],
            'image' => $imageUrl,
            'location' => $validated['location'],
            'status' => $checked,
            'price' => $validated['price']
        ]);
        return redirect()->route('product.create')->with('status', $item ? 'Produk berhasil ditambahkan!' : 'Gagal menambahkan produk');
    }

    public function update($id, UpdateItemRequest $request){
        $validated = $request->validated();

        $item = Item::findOrFail($id);

        $checked = $request->has('status') ? true : false;
        $newItem;

        if($request->file('image')){
            Storage::disk('public')->delete($item->image);

            $file = $request->file('image');
            $name = $file->getClientOriginalName();
            $filename = str_replace(" ", "", $name).'_'.now()->timestamp;

            $imageUrl = Storage::disk('public')->putFileAs('images', $file, $filename);

            $newItem = $item->update([
                'name' => $validated['name'],
                'description' => $validated['description'],
                'image' => $imageUrl,
                'location' => $validated['location'],
                'status' => $checked,
                'price' => $validated['price']
            ]);
        }else{
            $newItem = $item->update([
                'name' => $validated['name'],
                'description' => $validated['description'],
                'location' => $validated['location'],
                'status' => $checked,
                'price' => $validated['price']
            ]);
        }

        $status = $newItem ? 'Berhasil mengubah produk!' : 'Gagal mengubah produk';

        return redirect()->route('product.detail', ['id' => $id])->with($newItem ? 'success' : 'fail', $status);
    }

    public function delete($id){
        $item = Item::findOrFail($id);

        Storage::disk('public')->delete($item->image);
        if($item->delete()){
            $carts = CartDetail::where('item_id', '=', $id);
            $carts->delete();
            return redirect()->route('home')->with('success','Berhasil menghapus produk');
        }else{
            return redirect()->route('home')->with('fail','Gagal menghapus produk');
        }
    }
}

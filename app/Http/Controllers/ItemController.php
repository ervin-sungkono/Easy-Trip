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
            ->paginate(12);
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
        $filename = now()->timestamp.'_'.str_replace(" ", "", $name);

        $checked = $request->has('status') ? true : false;

        $storage = Storage::disk('public');
        $imageUrl = $storage->putFileAs('images', $file, $filename);
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
        $storage = Storage::disk('public');

        $checked = $request->has('status') ? true : false;
        $newItem = null;

        if($request->file('image')){
            $storage->delete($item->image);

            $file = $request->file('image');
            $name = $file->getClientOriginalName();
            $filename = now()->timestamp.'_'.str_replace(" ", "", $name);

            $imageUrl = $storage->putFileAs('images', $file, $filename);

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
            return redirect()->route('product.index')->with('success','Berhasil menghapus produk');
        }else{
            return redirect()->route('product.index')->with('fail','Gagal menghapus produk');
        }
    }
}

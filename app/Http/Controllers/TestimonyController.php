<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Testimony;
use App\Http\Requests\TestimonyRequest;
use Illuminate\Support\Facades\Auth;

class TestimonyController extends Controller
{
    public function store(TestimonyRequest $request){
        $validated = $request->validated();

        $testimony = Testimony::create([
            'item_id' => $request->item_id,
            'user_id' => Auth::user()->id,
            'text' => $validated['review'],
            'rating' => $validated['rating'],
        ]);

        $status = $testimony ? "success" : "fail";
        $statusText = $testimony ? "Berhasil menambahkan review" : "Gagal memambahkan review";

        return redirect()->route('product.detail', ['id' => $request->item_id])->with($status, $statusText);
    }

    public function update(TestimonyRequest $request, $id){
        $validated = $request->validate();

        $testimony = Testimony::findOrFail($id);

        $updatedTestimony = $testimony::update([
            'text' => $validated['review'],
            'rating' => $validated['rating'],
        ]);

        $status = $updatedTestimony ? "success" : "fail";
        $statusText = $updatedTestimony ? "Berhasil mengubah review" : "Gagal mengubah review";

        return redirect()->route('product.detail', ['id' => $request->item_id])->with($status, $statusText);
    }

    public function delete($id){
        $testimony = Testimony::find($id);
        $item_id = $testimony->item_id;

        if(!$testimony->user_id === Auth::user()->id && !Auth::user()->role === 'admin'){
            return redirect()->route('product.detail', ['id' => $item_id])->with('fail', 'Tidak diizinkan menghapus review ini');
        }

        $deleted = $testimony->delete();

        $status = $deleted ? "success" : "fail";
        $statusText = $deleted ? "Berhasil mengubah review" : "Gagal mengubah review";

        return redirect()->route('product.detail', ['id' => $item_id])->with($status, $statusText);
    }
}

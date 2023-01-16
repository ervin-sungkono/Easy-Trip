<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TestimonyController extends Controller
{
    public function Testimony(){
        $testimony = Testimony::all();
        return view('Testimony', ['Testimony'=>$testimony]);
    }

    public function createTestimony(Request $req){
        $testimony = new Testimony();
        $testimony->text = $req->text;
        $testimony->rating = $req->rating;

        $testimony-> save();
    }

    public function updateTestimony(Request $req){
        $testimony = Testimony::find($req->id);

        $testimony->text = $req->text != null ? $req->text:Testimony->text;
        $testimony->rating = $req->rating != null ? $req->rating:Testimony->text;

        $testimony-> save();
    }
    public function deleteTestimony($id){
        $testimony = Testimony::find($id);
        $testimony->delete();
    }
}

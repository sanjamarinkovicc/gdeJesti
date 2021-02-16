<?php

namespace App\Http\Controllers;

use App\Models\Film;
use App\Models\Restoran;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class RestoranController extends Controller
{
    public function view($id){

        $pieces = explode("/", url()->current());
        $restoran= Restoran::findOrFail($pieces[count($pieces)-1]);
        return view('restoran',['restoran'=>$restoran]);

    }
    public function create(Request $request){
        $restoran= new Restoran();
        $restoran->ime=$request->ime;
        $restoran->opis=$request->opis;
        $restoran->slika=$request->slika;
        $restoran->grad=$request->grad;
        $restoran->ocena=$request->ocena;
        $restoran->adresa=$request->adresa;
        $restoran->kategorija_id=$request->kategorija_id;
        $restoran->save();
        return redirect('/'.$request->kategorija_id.'/'.$request->id);
    }
    public function getAll(){

        return response()->json(Restoran::all(),200);
    }
    public function getById($id){
        $restoran=Restoran::find($id);
        if(is_null($restoran)){
            return response()->json(["message"=>"Ne postoji restoran!"],404);
        }
        return response()->json($restoran,200);
    }
    public function save(Request $request){

        $validator = Validator::make($request->all(), [
            'ime'=>'required|min:2',
            'opis'=>'required|min:2',
            'adresa'=>'required|min:2',
            'grad'=>'required|min:2',
            'slika'=>'required|min:2',
            'ocena'=>'required',
            'kategorija_id'=>'required',

        ]);

        if ($validator->fails()) {
            return response()->json(["message"=>"Sva polja su obavezna"],400);
        }
        $restoran= Restoran::create($request->all());
        return response()->json($restoran, 201);
    }
    public function delete(Request $request, $id){
        $restoran=Restoran::find($id);

        if(is_null($restoran)){
            return response()->json(["message"=>"Ne postoji resotran!"],404);
        }
        $restoran->delete();
        return response()->json(null,204);
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Film;
use App\Models\Kategorija;
use App\Models\Restoran;
use App\Models\Zanr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class KategorijaController extends Controller
{
    public function all(){
        $kategorije=Kategorija::all();
        $restorani= Restoran::all();
        foreach ($kategorije as $kategorija){
            $add=[];
            foreach ($restorani as $restoran){
                if($restoran->kategorija_id==$kategorija->id){
                    $add[count($add)]=$restoran;
                }
            }
            $kategorija->restorani=$add;
        }
        return view('kategorije', [
            'kategorije'=>$kategorije
        ]);

    }
    public function view($id){
        $kategorija= Kategorija::findOrFail($id);
        $restorani= Restoran::all();
        $add=[];
        foreach ($restorani as $restoran){
            if($restoran->kategorija_id==$kategorija->id){
                $add[count($add)]=$restoran;
            }
        }
        $kategorija->restorani=$add;
            return view('kategorija',['kategorija'=>$kategorija]);

    }
    public function create(Request $request){
        $kategorija= new Kategorija();
        $kategorija->naziv=$request->naziv;
        $kategorija->save();
        return redirect('/'.$request->id);
    }
    public function save(Request $request){

        $validator = Validator::make($request->all(), [
            'naziv'=>'required|min:2'
        ]);

        if ($validator->fails()) {
            return response()->json(["message"=>"Naziv je obavezan i mora biti veci od 2 karaktera"],400);
        }
        $kategorija= Kategorija::create($request->all());
        return response()->json($kategorija, 201);
    }
    public function delete(Request $request, $id){
        $kategorija=Kategorija::find($id);
        $restorani=Restoran::all();
        if(is_null($kategorija)){
            return response()->json(["message"=>"Kategorija ne postoji!"],404);
        }
        foreach ($restorani as $restoran) {
            if ($restoran->kategorija_id == $kategorija->id){
                $restoran->delete();
            }
        }
        $kategorija->delete();
        return response()->json(null,204);
    }
    public function getAll(){
        $kategorije=Kategorija::all();
        $restorani=Restoran::all();
        foreach ($kategorije as $kategorija){
            $add=[];
            foreach ($restorani as $restoran){
                if($restoran->kategorija_id==$kategorija->id){
                    $add[count($add)]=$restoran;
                }
            }
            $kategorija->restorani=$add;
        }

        return response()->json($kategorije,200);
    }
    public function getById($id){
        $kategorija=Kategorija::find($id);
        $restorani=Restoran::all();
        if(is_null($kategorija)){
            return response()->json(["message"=>"Kategorija ne postoji!"],404);
        }
        $add=[];
        foreach ($restorani as $restoran){
            if($restoran->kategorija_id==$kategorija->id){
                $add[count($add)]=$restoran;
            }
        }
        $kategorija->restorani=$add;
        return response()->json($kategorija,200);
    }
}

<?php

namespace App\Http\Controllers;
use App\Models\Mapel;
use Illuminate\Http\Request;

class MapelController extends Controller
{
    public function index(){

        $mapel=Mapel::all();
    
        $respon = [
            'status' => 'berhasil',
            'data' => $mapel,
        ];
        return response()->json($respon,200);
      }
    
      public function tambahmapel(Request $request){
    
       $mapel=new Mapel();
       $mapel->nama_mapel=$request->nama_mapel;
       $mapel->save();
       $respon = [
        'status' => 'berhasil',
        'data' => $mapel,
    ];
    return response()->json($respon,200);
      }
    
      public function update(Request $request, $id){
    
        $mapel= Mapel::findOrFail($id);
        $mapel->nama_mapel=$request->nama_mapel;
        $mapel->save();
        $respon = [
         'status' => 'berhasil',
         'data' => $mapel,
     ];
    
         return response()->json($respon,200);
       }
     
       public function delete( $id){
    
        $mapel= Mapel::findOrFail($id);
        $mapel->delete(); 
    
        $respon = [
         'status' => 'berhasil',
         'data' => $mapel,
     ];
         return response()->json($respon,200);
       }
}



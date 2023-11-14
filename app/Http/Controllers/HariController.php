<?php

namespace App\Http\Controllers;
use App\Models\Hari;
use Illuminate\Http\Request;

class HariController extends Controller
{
  public function index(){

    $hari=Hari::all();

    $respon = [
        'status' => 'berhasil',
        'data' => $hari,
    ];
    return response()->json($respon,200);
  }

  public function tambahhari(Request $request){

   $hari=new Hari();
   $hari->nama_hari=$request->nama_hari;
   $hari->save();
   $respon = [
    'status' => 'berhasil',
    'data' => $hari,
];
return response()->json($respon,200);
  }

  public function update(Request $request, $id){

    $hari= Hari::findOrFail($id);
    $hari->nama_hari=$request->nama_hari;
    $hari->save();
    $respon = [
     'status' => 'berhasil',
     'data' => $hari,
 ];

     return response()->json($respon,200);
   }
 
   public function delete( $id){

    $hari= Hari::findOrFail($id);
    $hari->delete(); 

    $respon = [
     'status' => 'berhasil',
     'data' => $hari,
 ];
     return response()->json($respon,200);
   }
}

<?php

namespace App\Http\Controllers;
use App\Models\Kelass;
use Illuminate\Http\Request;

class KelasController extends Controller
{
    public function index(){

        $kelas = Kelass::all();
    
        $respon = [
            'status' => 'berhasil',
            'data' => $kelas,
        ];
        return response()->json($respon,200);
      }
    
      public function tambahkelas(Request $request){
    
       $kelas=new kelass();
       $kelas->nama_kelas=$request->nama_kelas;
       $kelas->save();
       $respon = [
        'status' => 'berhasil',
        'data' => $kelas,
    ];
    return response()->json($respon,200);
      }
    
      public function update(Request $request, $id){
    
        $kelas=Kelass::findOrFail($id);
        $kelas->nama_kelas=$request->nama_kelas;
        $kelas->save();
        $respon = [
         'status' => 'berhasil',
         'data' => $kelas,
     ];
    
         return response()->json($respon,200);
       }
     
       public function delete( $id){
    
        $kelas= Kelass::findOrFail($id);
        $kelas->delete(); 
    
        $respon = [
         'status' => 'berhasil',
         'data' => $kelas,
     ];
         return response()->json($respon,200);
       }
}

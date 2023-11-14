<?php

namespace App\Http\Controllers;
use App\Models\Tugas_Siswa;
use Illuminate\Http\Request;

class Tugas_SiswaController extends Controller
{
    public function index(){

        $tugas_siswa=Tugas_Siswa::all();
    
        $respon = [
            'status' => 'berhasil',
            'data' => $tugas_siswa,
        ];
        return response()->json($respon,200);
      }
    
      public function store(Request $request)
      {
          $validated = Validator::make($request->all(), [
              'hari_id' => 'required',
              'kelas_id' => 'required',
              'mapel_id' => 'required',
              'tugas' => 'required',
          ]);
          if ($validated->fails()) {
              return response()->json($validated->errors(), 400);
          }
          $tugas = new Tb_tugas_siswa();
          $tugas->hari_id = $request->hari_id;
          $tugas->kelas_id = $request->kelas_id;
          $tugas->mape_id = $request->mapel_id;
          $tugas->tugas = $request->tugas_id;
          $tugas->save();
  
          $user = User::where('id_kelas', $request->id_kelas)->get();
          foreach ($user as $item) {
              $pengumpulan = new Tb_pengumpulan();
              $pengumpulan->tugas_id = $tugas->id;
              $pengumpulan->user_id = $item->id;
              $pengumpulan->status = 0;
              $pengumpulan->save();
          }
          $respon = [
              'success' => true,
              'data' => $tugas,
              'message' => 'Tugas siswa telah ditambahkan sesuai banyak user',
          ];
  
          return response()->json($respon, 200);
      }
    
      public function update(Request $request, $id){
    
        $tugas_siswa= Tugas_Siswa::findOrFail($id);
        $tugas_siswa->nama_tugas_siswa=$request->kelas_id;
        $tugas_siswa->nama_tugas_siswa=$request->mapel_id;
        $tugas_siswa->nama_tugas_siswa=$request->hari_id;
        $tugas_siswa->save();
        $respon = [
         'status' => 'berhasil',
         'data' => $tugas_siswa,
     ];
    
         return response()->json($respon,200);
       }
     
       public function delete( $id){
    
        $tugas_siswa= Tugas_Siswa::findOrFail($id);
        $tugas_siswa->delete(); 
    
        $respon = [
         'status' => 'berhasil',
         'data' => $tugas_siswa,
     ];
         return response()->json($respon,200);
       }
}

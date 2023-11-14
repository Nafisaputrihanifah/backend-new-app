<?php

namespace App\Http\Controllers;

use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Validator;
use App\Models\Tb_pengumpulan;
use Illuminate\Http\Request;

class TbPengumpulanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    public function pengumpulan_tugas(Request $request, $id)
    {
        $validated = Validator::make($request->all(), [
            'isi_tugas' => 'required',
            'id_user' => 'required',
        ]);
        if ($validated->fails()) {
            return response()->json($validated->errors(), 400);
        }
        $id_user = $request->id_user;
        $pengerjaan = Tb_pengumpulan::where('id_tugas', $id)
            ->where('id_user', $id_user)
            ->first();
        if ($pengerjaan) {
            $pengerjaan->isi_tugas = $request->isi_tugas;
            $pengerjaan->status = 1;
            $pengerjaan->save();
        }
        $respon = [
            'success' => true,
            'data' => $pengerjaan,
            'message' => 'Data Hari Ditampilkan',
        ];
        return response()->json($respon, 200);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Tb_pengumpulan  $tb_pengumpulan
     * @return \Illuminate\Http\Response
     */
    public function show(Tb_pengumpulan $tb_pengumpulan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Tb_pengumpulan  $tb_pengumpulan
     * @return \Illuminate\Http\Response
     */
    public function edit(Tb_pengumpulan $tb_pengumpulan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Tb_pengumpulan  $tb_pengumpulan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Tb_pengumpulan $tb_pengumpulan)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Tb_pengumpulan  $tb_pengumpulan
     * @return \Illuminate\Http\Response
     */
    public function destroy(Tb_pengumpulan $tb_pengumpulan)
    {
        //
    }
}
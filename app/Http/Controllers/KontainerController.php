<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\KapalModel;
use App\Models\KontainerModel;

class KontainerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
           return view('kontainer',[
            'getdatakontainer' => KontainerModel::orderBy('id_kontainer','DESC')
                                              ->join('kapal','kapal.id_kapal','kontainer.id_kapal')
                                              ->get(),
            'getdatakapal' => KapalModel::orderBy('id_kapal','DESC')
                                              ->get(),
        ]);
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
        $datakapal = KapalModel::where('id_kapal',$request->id_kapal)->get();
        foreach ($datakapal as $datap) {
            $kapasitas = $datap['kapasitas_tersedia'] - 1;
        }

        $datak = [
            'kapasitas_tersedia' => $kapasitas,
        ];
       
        $data = [
            'nomor_kontainer' => random_int(11111111,999999999),
            'nama_kontainer' => $request->nama_kontainer,
            'ukuran' => $request->ukuran,
            'kapasitas_berat' => $request->kapasitas_berat,
            'kapasitas_tersedia_k' => $request->kapasitas_berat,
            'id_kapal' => $request->id_kapal,
        ];
        if ($kapasitas < 0) {
             return redirect('/kontainer')->with('error','Kapal sudah full');
        }
        KapalModel::where('id_kapal',$request->id_kapal)->update($datak);
        KontainerModel::create($data);
        return redirect('/kontainer')->with('pesan','Berhasil menambahkan data kontainer ');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
       
        $selisih = $request->kapasitas_sekarang - $request->kapasitas_berat;
        $kapasitas_tersedia = $request->kapasitas_tersedia_k - $selisih;
        $datakapal = KapalModel::where('id_kapal',$request->id_kapal)->get();
        foreach ($datakapal as $datap) {
            $kapasitas = $datap['kapasitas_tersedia'];
        }
        $datakapall = KapalModel::where('id_kapal',$request->id_lama)->get();
        foreach ($datakapall as $datal) {
            $kapasitasl = $datal['kapasitas_tersedia'];
        }
        
        
      
       

        if ($kapasitas_tersedia < 0) {
            return redirect('/kontainer')->with('error','Gagal mengubah kontainer kapal, kapasitas tersedia < 0 ');
        }
        else{

             $data = [
            'nama_kontainer' => $request->nama_kontainer,
            'ukuran' => $request->ukuran,
            'kapasitas_berat' => $request->kapasitas_berat,
            'kapasitas_tersedia_k' => $kapasitas_tersedia,
            'id_kapal' => $request->id_kapal,
            
            ];
            if ($datap['kapasitas_kontainer']!=$datal['kapasitas_kontainer']) {
                KapalModel::where('id_kapal',$request->id_kapal)->update(['kapasitas_tersedia' => $datap['kapasitas_tersedia'] - 1]);
                KapalModel::where('id_kapal',$request->id_lama)->update(['kapasitas_tersedia' => $datal['kapasitas_tersedia'] + 1]);
                KontainerModel::where('id_kontainer','=',$request->id_kontainer)->update($data);
                return redirect('/kontainer')->with('pesan','Berhasil mengubah data kontainer ');
            }
            
            else{
                KontainerModel::where('id_kontainer','=',$request->id_kontainer)->update($data);
                return redirect('/kontainer')->with('pesan','Berhasil mengubah data kontainer ');
            }
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id_kontainer, Request $request)
    {
        KapalModel::where('id_kapal',$request->id_kapal)->update(['kapasitas_tersedia' => $request->kapasitas_tersedia + 1]);
        KontainerModel::where('id_kontainer','=',$id_kontainer)->delete();
        return redirect('/kontainer')->with('pesan','Berhasil menghapus data kontainer ');
    
    }
}

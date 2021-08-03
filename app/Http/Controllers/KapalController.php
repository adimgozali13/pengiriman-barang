<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\KapalModel;

class KapalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
           return view('kapal',[
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
      
        
        $data = [
            'nomor_kapal' => random_int(11111111,999999999),
            'nama_kapal' => $request->nama_kapal,
            'panjang' => $request->panjang,
            'lebar' => $request->lebar,
            'kapasitas_kontainer' => $request->kapasitas_kontainer,
            'kapasitas_tersedia' => $request->kapasitas_kontainer,
        ];

        KapalModel::create($data);
        return redirect('/kapal')->with('pesan','Berhasil menambahkan data kapal ');
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
        $selisih = $request->kapasitas_sekarang - $request->kapasitas_kontainer ;
        $kapasitas_tersedia = $request->kapasitas_tersedia - $selisih;

        if ($kapasitas_tersedia <= 0) {
            return redirect('/kapal')->with('error','Gagal mengubah data kapal, kapasitas tersedia < 0 ');
        }
        else{

             $data = [
            'nama_kapal' => $request->nama_kapal,
            'panjang' => $request->panjang,
            'lebar' => $request->lebar,
            'kapasitas_kontainer' => $request->kapasitas_kontainer,
            'kapasitas_tersedia' => $kapasitas_tersedia,
            
            ];
            KapalModel::where('id_kapal','=',$request->id_kapal)->update($data);
            return redirect('/kapal')->with('pesan','Berhasil mengubah data kapal ');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id_kapal)
    {
        KapalModel::where('id_kapal','=',$id_kapal)->delete();
        return redirect('/kapal')->with('pesan','Berhasil menghapus data kapal ');
    
    }
}

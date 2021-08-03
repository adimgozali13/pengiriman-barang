<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\KapalModel;
use App\Models\KontainerModel;
use App\Models\PengirimanModel;
use App\Models\NegaraModel;
use App\Models\PelabuhanModel;

class PengirimanController extends Controller
{
    /**
     * Display a listing of the resource.
     *S
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
           return view('pengiriman',[
            'getdatapengiriman' => PengirimanModel::orderBy('status_pengiriman','ASC')
                                                    ->orderBy('id_pengiriman','DESC')
                                                    ->join('kontainer','kontainer.id_kontainer','pengiriman.id_kontainer')
                                                    ->get(),
            'getdatakapal' => KapalModel::orderBy('id_kapal','DESC')
                                              ->get(),
            'getdatanegara' => NegaraModel::orderBy('nama_negara','ASC')
                                              ->get(),
        ]);
    }
    public function ajax($id){
        
        $pelabuhan = PelabuhanModel::where('id_negara','=',$id)->pluck('nama_pelabuhan','id_pelabuhan');
        return json_encode($pelabuhan);

    }
    public function kontainer($id){
        
        $kontainer = KontainerModel::where('id_kapal','=',$id)->pluck('nama_kontainer','id_kontainer');
        return json_encode($kontainer);

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
        $datakontainer = KontainerModel::where('id_kontainer',$request->id_kontainer)->get();
        foreach ($datakontainer as $datap) {
            $kapasitas = $datap['kapasitas_tersedia_k'] - $request->berat_barang;
        }

       $datak = [
        'kapasitas_tersedia_k' => $kapasitas,
       ];
       
        $data = [
            'nomor_barang' => random_int(11111111,999999999),
            'nama_barang' => $request->nama_barang,
            'berat_barang' => $request->berat_barang,
            'pelabuhan_asal' => $request->pelabuhan_asal,
            'pelabuhan_tujuan' => $request->pelabuhan_tujuan,
            'status_pengiriman' => "Dikirim",
            'id_kontainer' => $request->id_kontainer,
        ];
        if ($kapasitas < 0) {
             return redirect('/pengiriman')->with('error','Kapasitas kontainer tidak cukup');
        }
        KontainerModel::where('id_kontainer',$request->id_kontainer)->update($datak);
        PengirimanModel::create($data);
        return redirect('/pengiriman')->with('pesan','Berhasil menambahkan data pengiriman ');
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
        
       
        $selisih = $request->berat_barang - $request->berat_sekarang ;
        $kapasitas_tersedia = $request->kapasitas_tersedia_k - $selisih;
       
        $datakontainer = KontainerModel::where('id_kontainer',$request->id_kontainer)->get();
        foreach ($datakontainer as $datap) {
            $kapasitas = $datap['kapasitas_tersedia'];
        }
        $datakontainerl = KontainerModel::where('id_kontainer',$request->id_lama)->get();
        foreach ($datakontainerl as $datal) {
            $kapasitasl = $datal['kapasitas_tersedia'];
        }

        if ($kapasitas_tersedia < 0) {
            return redirect('/pengiriman')->with('error','Gagal mengubah pengiriman kapal, kapasitas tersedia < 0 ');
        }
        else{
             $data = [
                'nama_barang' => $request->nama_barang,
                'berat_barang' => $request->berat_barang,
                'pelabuhan_asal' => $request->pelabuhan_asal,
                'pelabuhan_tujuan' => $request->pelabuhan_tujuan,
                'status_pengiriman' => $request->status_pengiriman,
                'id_kontainer' => $request->id_kontainer,
            
            ];
            KontainerModel::where('id_kontainer',$request->id_kontainer)->update([
                'kapasitas_tersedia_k' => $kapasitas_tersedia,
            ]);
            PengirimanModel::where('id_pengiriman',$request->id_pengiriman)->update($data);
            return redirect('/pengiriman')->with('pesan','Berhasil mengubah data pengiriman ');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id_pengiriman , Request $request)
    {
        KontainerModel::where('id_kontainer',$request->id_kontainer)->update([
            'kapasitas_tersedia_k' => $request->kapasitas_tersedia_k + $request->berat_barang,
        ]);
        PengirimanModel::where('id_pengiriman','=',$id_pengiriman)->delete();
        return redirect('/pengiriman')->with('pesan','Berhasil menghapus data pengiriman ');
    
    }
}

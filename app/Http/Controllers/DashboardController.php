<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PengirimanModel;
use App\Models\KapalModel;
use App\Models\KontainerModel;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard',[
            'totaldikirim' => PengirimanModel::where('status_pengiriman','Dikirim')->count('id_pengiriman'),
            'totalterkirim' => PengirimanModel::where('status_pengiriman','Terkirim')->count('id_pengiriman'),
            'totalkapal' => KapalModel::count('id_kapal'),
            'totalkontainer' => KontainerModel::count('id_kontainer'),
            'track' => false,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function tracking(Request $request)
    {
        return view('dashboard',[
            'totaldikirim' => PengirimanModel::where('status_pengiriman','Dikirim')->count('id_pengiriman'),
            'totalterkirim' => PengirimanModel::where('status_pengiriman','Terkirim')->count('id_pengiriman'),
            'totalkapal' => KapalModel::count('id_kapal'),
            'totalkontainer' => KontainerModel::count('id_kontainer'),
            'getdatapengiriman' => PengirimanModel::where('nomor_barang',$request->nomor_barang)
                                                    ->join('kontainer','kontainer.id_kontainer','pengiriman.id_kontainer')
                                                    ->get(),
            'track' => true,
        ]);
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
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

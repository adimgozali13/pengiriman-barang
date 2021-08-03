<?php

namespace App\Http\Controllers;

use App\Models\PengirimanModel;
use App\Models\PelabuhanModel;
use App\Models\KontainerModel;
use Illuminate\Http\Request;

class DatapengirimanController extends Controller
{

    public function index(){
    $pelabuhan = PelabuhanModel::where('id_pelabuhan',session('id_pelabuhan'))->get();
    foreach ($pelabuhan as $data) {
        $data['nama_pelabuhan'];
    }

        return view('datapengiriman',[
            'getdatapengiriman' => PengirimanModel::orderBy('status_pengiriman','ASC')
                                                    ->orderBy('id_pengiriman','DESC')
                                                    ->where('pelabuhan_tujuan',$data['nama_pelabuhan'])
                                                    ->join('kontainer','kontainer.id_kontainer','pengiriman.id_kontainer')
                                                    ->get(),
        ]);
    }
    public function terima(Request $request ){
            $kontainer = KontainerModel::where('id_kontainer',$request->id_kontainer)->get();
            foreach ($kontainer as $data) {
                $data['kapasitas_tersedia_k'];
            }
            KontainerModel::where('id_kontainer',$request->id_kontainer)->update([
                'kapasitas_tersedia_k' => $data['kapasitas_tersedia_k'] + $request->berat_barang,
            ]);

            PengirimanModel::where('id_pengiriman',$request->id_pengiriman)->update([
                'status_pengiriman' => 'Terkirim',
            ]);
            return redirect('/datapengiriman')->with('pesan','Berhasil Diterima');
    }
}

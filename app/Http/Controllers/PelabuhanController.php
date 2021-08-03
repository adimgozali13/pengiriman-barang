<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PelabuhanModel;
use App\Models\NegaraModel;
class PelabuhanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('pelabuhan',[
            'getdatapelabuhan' => PelabuhanModel::join('negara','negara.id_negara','pelabuhan.id_negara')
                                                ->orderBy('id_pelabuhan','DESC')
                                                ->get(),
            
            'getdatanegara' => NegaraModel::orderBy('nama_negara','ASC')
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
        $data = $request->all();

        PelabuhanModel::create($data);
        return redirect('/pelabuhan')->with('pesan','Berhasil menambahkan data pelabuhan ');
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
        $data = [
            'nama_pelabuhan' => $request->nama_pelabuhan,
            'id_negara' => $request->id_negara,
        ];
        PelabuhanModel::where('id_pelabuhan','=',$request->id_pelabuhan)->update($data);
        return redirect('/pelabuhan')->with('pesan','Berhasil mengubah data pelabuhan ');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id_pelabuhan)
    {
         PelabuhanModel::where('id_pelabuhan','=',$id_pelabuhan)->delete();
        return redirect('/pelabuhan')->with('pesan','Berhasil menghapus data pelabuhan ');
    }
}

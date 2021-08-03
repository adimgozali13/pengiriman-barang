<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\NegaraModel;

class NegaraController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('negara',[
            'getdatanegara' => NegaraModel::orderBy('id_negara','DESC')->get(),
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

        NegaraModel::create($data);
        return redirect('/negara')->with('pesan','Berhasil menambahkan negara ');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id_negara
     * @return \Illuminate\Http\Response
     */
    public function show($id_negara)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id_negara
     * @return \Illuminate\Http\Response
     */
    public function edit($id_negara)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id_negara
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
       
        $data = [
            'nama_negara' => $request->nama_negara,
        ];
        NegaraModel::where('id_negara','=',$request->id_negara)->update($data);
        return redirect('/negara')->with('pesan','Berhasil mengubah data negara ');
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id_negara
     * @return \Illuminate\Http\Response
     */
    public function destroy($id_negara)
    {
        NegaraModel::where('id_negara','=',$id_negara)->delete();
        return redirect('/negara')->with('pesan','Berhasil menghapus negara ');
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UserModel;
use App\Models\PelabuhanModel;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('user',[
            'getdatauser' => UserModel::where('level','Operator Pelabuhan')
                                        ->join('pelabuhan','pelabuhan.id_pelabuhan','user.id_pelabuhan')
                                        ->orderBy('id_user','DESC')
                                        ->get(),
            'getdatapelabuhan' => PelabuhanModel::orderBy('nama_pelabuhan','ASC')->get(),
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
        if ($request->password != $request->confirmpass) {
            return redirect('/user')->with('error','Password tidak sama');
        }
        else{
            $data = [
                'username' => $request->username,
                'password' => Hash::make($request->password),
                'level' => "Operator Pelabuhan",
                'id_pelabuhan' => $request->id_pelabuhan,
            ];
            UserModel::create($data);
            return redirect('/user')->with('pesan','Berhasil menambahkan user');
        }
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
        if (!$request->password) {
            UserModel::where('id_user',$request->id_user)->update([
                'username' => $request->username,
                'id_pelabuhan' => $request->id_pelabuhan,
            ]);
            return redirect('/user')->with('pesan','Berhasil mengubah data user');
        }
        else{
            if ($request->password != $request->confirmpass) {
                return redirect('/user')->with('error','Password tidak sama');
            }
            else{
                 UserModel::where('id_user',$request->id_user)->update([
                        'username' => $request->username,
                        'id_pelabuhan' => $request->id_pelabuhan,
                        'password' => Hash::make($request->password),
                    ]);
                    return redirect('/user')->with('pesan','Berhasil mengubah data user');
            }
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id_user)
    {
        UserModel::where('id_user','=',$id_user)->delete();
        return redirect('/user')->with('pesan','Berhasil menghapus data user ');
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UserModel;

class LoginController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (session('login')) {
           return back();
            
        }
        return view('login');
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
        $data = UserModel::where('username',$request->username)->first();
        if ($data) {
            $password = $data['password'];
            if (password_verify($request->password,$password)) {
                    session()->put([
                        'id_user' => $data['id_user'],
                        'username' => $data['username'],
                        'level' => $data['level'],
                        'id_pelabuhan' => $data['id_pelabuhan'],
                        'login' => true
                    ]);
                    if ($data['level']=="Super Admin") {
                        return redirect('/dashboard');
                    }
                    elseif ($data['level']=="Operator Pelabuhan") {
                        return redirect('/datapengiriman');
                    }
            }
            else{
                return redirect('/login')->with('error','Password Salah');

            }
        }
        else{
            return redirect('/login')->with('error','Username tidak tersedia');
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
    public function logout()
    {
        session()->flush();
        return redirect('/login');
        //
    }
}

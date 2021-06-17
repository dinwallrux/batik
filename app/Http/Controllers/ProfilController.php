<?php

namespace App\Http\Controllers;

use App\Profil;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ProfilController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Profil::all()->first();

        return view('pages.profil.index', compact('data'));
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
        $data = Profil::where('id', $id)->get()->first();
        return view('pages.profil.editView', compact('data'));
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
        $rules = array(
            'alamat' => 'required',
            'deskripsi' => 'required',
            'email' => 'required',
            'telepon' => 'required',
        );

        $data = [
            'alamat' => $request->alamat,
            'deskripsi' => $request->deskripsi,
            'email' => $request->email,
            'telepon' => $request->telepon,
        ];

        $validator = Validator::make($data, $rules);
        if($validator->fails()){
            $errors = $validator->errors();
            return redirect()->route('profil.edit')->withErrors($errors)->withInput($request->all());
        } else{
            Profil::where('id', $id)->update($data);
            return redirect()->route('profil.index')
                ->with('success', 'Profil berhasil diupdate.');
        }
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

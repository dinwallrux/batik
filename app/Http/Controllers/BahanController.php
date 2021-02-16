<?php

namespace App\Http\Controllers;

use App\Bahan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class BahanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $number = 1;
        $datas = Bahan::latest()->get();
        return view('pages.bahan.index', compact('number', 'datas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.bahan.createView');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules = [
            'nama' => 'required'
        ];

        $data = [
            'nama' => $request->nama
        ];

        $validator = Validator::make($data, $rules);
        if($validator->fails()){
            $errors = $validator->errors();
            return redirect()->route('bahan.edit')->withErrors($errors)->withInput($request->all());
        } else{
            Bahan::create($data);
            return redirect()->route('bahan.index')
                ->with('success', 'Bahan berhasil ditambahkan.');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Bahan  $bahan
     * @return \Illuminate\Http\Response
     */
    public function show(Bahan $bahan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Bahan  $bahan
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Bahan::where('id', $id)->get()->first();
        return view('pages.bahan.editView', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Bahan  $bahan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Bahan $bahan)
    {
        $rules = array(
            'nama' => 'required',
        );

        $data = [
            'nama' => $request->nama,
        ];

        $validator = Validator::make($data, $rules);
        if($validator->fails()){
            $errors = $validator->errors();
            return redirect()->route('bahan.edit')->withErrors($errors)->withInput($request->all());
        } else{
            Bahan::where('id', $request->id)->update($data);
            return redirect()->route('bahan.index')
                ->with('success', 'Bahan Baku berhasil diupdate.');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Bahan  $bahan
     * @return \Illuminate\Http\Response
     */
    public function destroy(Bahan $bahan)
    {
        //
    }
}

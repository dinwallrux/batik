<?php

namespace App\Http\Controllers;

use App\Obat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ObatController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $number = 1;
        $datas = Obat::latest()->get();
        return view('pages.obat.index', compact('number', 'datas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.obat.createView');
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
            'nama' => 'required',
            'takaran' => 'required'
        ];

        $data = [
            'nama' => $request->nama,
            'takaran' => $request->takaran
        ];

        $validator = Validator::make($data, $rules);
        if($validator->fails()){
            $errors = $validator->errors();
            return redirect()->route('obat.tambah')->withErrors($errors)->withInput($request->all());
        } else{
            Obat::create($data);
            return redirect()->route('obat.index')
                ->with('success', 'Obat berhasil ditambahkan.');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Obat  $obat
     * @return \Illuminate\Http\Response
     */
    public function show(Obat $obat)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Obat  $obat
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Obat::where('id', $id)->get()->first();
        return view('pages.obat.editView', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Obat  $obat
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Obat $obat)
    {
        $rules = array(
            'nama' => 'required',
            'takaran' => 'required',
        );

        $data = [
            'nama' => $request->nama,
            'takaran' => $request->takaran
        ];

        $validator = Validator::make($data, $rules);
        if($validator->fails()){
            $errors = $validator->errors();
            return redirect()->route('obat.edit')->withErrors($errors)->withInput($request->all());
        } else{
            Obat::where('id', $request->id)->update($data);
            return redirect()->route('obat.index')
                ->with('success', 'Obat berhasil diupdate.');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Obat  $obat
     * @return \Illuminate\Http\Response
     */
    public function destroy(Obat $obat)
    {
        //
    }
}

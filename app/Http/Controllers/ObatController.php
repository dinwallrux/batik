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
        $lists = Obat::campuranObat();
        return view('pages.obat.createView', compact('lists'));
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
            'hasil' => 'required',
        ];

        $data = [
            'campuran_1' => $request->campuran_1,
            'takaran_1' => $request->takaran_1,
            'campuran_2' => $request->campuran_2,
            'takaran_2' => $request->takaran_2,
            'campuran_3' => $request->campuran_3,
            'takaran_3' => $request->takaran_3,
            'hasil' => $request->hasil,
        ];

        $validator = Validator::make($data, $rules);
        if($validator->fails()){
            $errors = $validator->errors();
            return redirect()->route('obat.create')->withErrors($errors)->withInput($request->all());
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
        $lists = Obat::campuranObat();
        $data = Obat::where('id', $id)->get()->first();
        return view('pages.obat.editView', compact('lists', 'data'));
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
            'hasil' => 'required',
        );

        $data = [
            'campuran_1' => $request->campuran_1,
            'takaran_1' => $request->takaran_1,
            'campuran_2' => $request->campuran_2,
            'takaran_2' => $request->takaran_2,
            'campuran_3' => $request->campuran_3,
            'takaran_3' => $request->takaran_3,
            'hasil' => $request->hasil,
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

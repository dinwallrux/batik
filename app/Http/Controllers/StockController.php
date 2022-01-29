<?php

namespace App\Http\Controllers;

use App\Stock;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class StockController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $numberKain = 1;
        $dataKain = Stock::where('jenis', 'kain')->latest()->get();
        $numberObat = 1;
        $dataObat = Stock::where('jenis', 'obat')->latest()->get();
        return view('pages.stock.index', compact('numberKain', 'dataKain', 'numberObat', 'dataObat'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.stock.createView');
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
            'stock' => 'required',
            'jenis' => 'required',
        ];

        $data = [
            'nama' => $request->nama,
            'stock' => $request->stock,
            'jenis' => $request->jenis,
        ];

        $validator = Validator::make($data, $rules);
        if($validator->fails()){
            $errors = $validator->errors();
            return redirect()->route('stock.edit')->withErrors($errors)->withInput($request->all());
        } else{
            Stock::create($data);
            return redirect()->route('stock.index')
                ->with('success', 'Stock bahan baku berhasil ditambahkan.');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Stock  $stock
     * @return \Illuminate\Http\Response
     */
    public function show(Stock $stock)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Stock  $stock
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Stock::where('id', $id)->get()->first();
        return view('pages.stock.editView', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Stock  $stock
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Stock $stock)
    {
        $rules = array(
            'nama' => 'required',
            'stock' => 'required',
            'jenis' => 'required',
        );

        $data = [
            'nama' => $request->nama,
            'stock' => $request->stock,
            'jenis' => $request->jenis,
        ];

        $validator = Validator::make($data, $rules);
        if($validator->fails()){
            $errors = $validator->errors();
            return redirect()->route('stock.edit')->withErrors($errors)->withInput($request->all());
        } else{
            $stock->update($data);
            return redirect()->route('stock.index')
                ->with('success', 'Stock bahan baku berhasil diupdate.');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Stock  $stock
     * @return \Illuminate\Http\Response
     */
    public function destroy(Stock $stock)
    {
        //
    }
}

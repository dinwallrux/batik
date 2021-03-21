<?php

namespace App\Http\Controllers;

use App\Produk;
use Image;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;

class ProdukController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $number = 1;
        $datas = Produk::latest()->get();
        return view('pages.produk.index', compact('number', 'datas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.produk.createView');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules = array(
            'nama' => 'required',
            'harga' => 'required',
            'gambar' => 'required',
        );

        $image      = $request->file('gambar');
        $fileName   = time() . '.' . $image->getClientOriginalExtension();

        $img = Image::make($image);
        $img->resize(300, 300, function ($constraint) {
            $constraint->aspectRatio();                 
        });
        $img->stream(); // <-- Key point

        Storage::disk('local')->put('public'.'/'.$fileName, $img);
        $url = Storage::url($fileName);

        $harga = str_replace('.', '', $request->harga);

        $data = [
            'nama' => $request->nama,
            'harga' => $harga,
            'gambar' => $url
        ];

        $validator = Validator::make($data, $rules);
        if($validator->fails()){
            $errors = $validator->errors();
            return redirect()->route('produk.tambah')->withErrors($errors)->withInput($request->all());
        } else{
            Produk::create($data);
            return redirect()->route('produk.index')
                ->with('success', 'Produk berhasil ditambahkan.');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Produk  $produk
     * @return \Illuminate\Http\Response
     */
    public function show(Produk $produk)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Produk  $produk
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Produk::where('id', $id)->get()->first();
        return view('pages.produk.editView', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Produk  $produk
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Produk $produk)
    {
        $rules = array(
            'nama' => 'required',
            'harga' => 'required',
            'gambar' => 'required',
        );

        // Ngambil gambar lama
        $oldPhoto = Produk::where('id', $request->id)->first()->getOriginal('gambar');

        // Check apakah ada gambar baru yg mau di update
        if($request->hasFile('gambar')){
            $image      = $request->file('gambar');
            $fileName   = time() . '.' . $image->getClientOriginalExtension();

            $img = Image::make($image);
            $img->resize(300, 300, function ($constraint) {
                $constraint->aspectRatio();                 
            });
            $img->stream(); // <-- Key point
    
            Storage::disk('local')->put('public'.'/'.$fileName, $img);
            $path = Storage::url($fileName);

            // Delete old image
            Storage::delete($oldPhoto);
        } else{
            $path = $oldPhoto;
        }

        $harga = str_replace('.', '', $request->harga);

        $data = [
            'nama' => $request->nama,
            'harga' => $harga,
            'gambar' => $path
        ];

        $validator = Validator::make($data, $rules);
        if($validator->fails()){
            $errors = $validator->errors();
            return redirect()->route('produk.edit')->withErrors($errors)->withInput($request->all());
        } else{
            Produk::where('id', $request->id)->update($data);
            return redirect()->route('produk.index')
                ->with('success', 'Produk berhasil diupdate.');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Produk  $produk
     * @return \Illuminate\Http\Response
     */
    public function destroy(Produk $produk)
    {
        //
    }
}
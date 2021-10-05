<?php

namespace App\Http\Controllers;

use App\Produk;
use App\Obat;
use Image;
use File;
use Illuminate\Support\Str;
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
        $colors = Obat::all();
        return view('pages.produk.createView', compact('colors'));
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
            'foto' => 'required',
        );

        $files = [];
        $image = $request->file('foto');
        foreach ($image as $key => $value) {
            $fileName   = Str::random(5) . time() . '.' . $value->getClientOriginalExtension();
            $img = Image::make($value);
            $img->resize(300, 300, function ($constraint) {
                $constraint->aspectRatio();
            });
            $img->stream(); // <-- Key point

            Storage::disk('local')->put('public'.'/'.$fileName, $img);
            $url = Storage::url($fileName);

            $files[] = $url;
        }
        $files = json_encode($files);

        // Replace format number
        $harga = str_replace('.', '', $request->harga);

        $data = [
            'nama' => $request->nama,
            'harga' => $harga,
            'foto' => $files,
            'deskripsi' => $request->deskripsi,
            'tampilkan' => $request->has('tampilkan')
        ];

        $validator = Validator::make($data, $rules);
        if($validator->fails()){
            $errors = $validator->errors();
            return redirect()->route('produk.tambah')->withErrors($errors)->withInput($request->all());
        } else{
            $produk = Produk::create($data);

            $produk->obat()->attach($request->warna);
            // $colorItems = Obat::find($request->warna)->get();
            // foreach($colorItems as $item){
            //     $produk->produk()->attach($item->id);
            // }
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
        return view('pages.produk.show', compact('produk'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Produk  $produk
     * @return \Illuminate\Http\Response
     */
    public function edit(Produk $produk)
    {
        $data = Produk::where('id', $produk->id)->with('obat')->get()->first();
        $colors = Obat::all();
        return view('pages.produk.editView', compact('data', 'colors'));
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
        );

        // Ngambil gambar lama
        $oldPhoto = $produk->getOriginal('foto');

        // Check apakah ada gambar baru yg mau di update
        if($request->hasFile('foto')){
            $files = [];
            $image = $request->file('foto');
            foreach ($image as $key => $value) {
                $fileName   = Str::random(5) . time() . '.' . $value->getClientOriginalExtension();
                $img = Image::make($value);
                $img->resize(300, 300, function ($constraint) {
                    $constraint->aspectRatio();
                });
                $img->stream(); // <-- Key point

                Storage::disk('local')->put('public'.'/'.$fileName, $img);
                $url = Storage::url($fileName);

                $files[] = $url;
            }
            $files = json_encode($files);
            
            // Delete old image
            if($oldPhoto != null) {
                foreach (json_decode($oldPhoto) as $key => $value) {
                    File::delete(public_path($value));
                }
            }
        } else{
            $files = $oldPhoto;
        }

        $harga = str_replace('.', '', $request->harga);

        $data = [
            'nama' => $request->nama,
            'harga' => $harga,
            'foto' => $files,
            'deskripsi' => $request->deskripsi,
            'tampilkan' => $request->has('tampilkan')
        ];

        $validator = Validator::make($data, $rules);
        if($validator->fails()){
            $errors = $validator->errors();
            return redirect()->route('produk.edit')->withErrors($errors)->withInput($request->all());
        } else{
            $produk->obat()->sync($request->warna);
            $produk->update($data);

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

    public function produkDetail($id)
    {
        $products = Produk::where('id', $id)->latest()->get();
        return view('produkDetail', compact('products'));
    }
}

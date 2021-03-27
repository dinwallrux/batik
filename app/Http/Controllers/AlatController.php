<?php

namespace App\Http\Controllers;

use Image;
use App\Alat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;

class AlatController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $number = 1;
        $datas = Alat::latest()->get();
        return view('pages.alat.index', compact('number', 'datas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.alat.createView');
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

        $image      = $request->file('gambar');
        $fileName   = time() . '.' . $image->getClientOriginalExtension();

        $img = Image::make($image);
        $img->resize(300, 300, function ($constraint) {
            $constraint->aspectRatio();                 
        });
        $img->stream(); // <-- Key point

        Storage::disk('local')->put('public'.'/'.$fileName, $img);
        $path = Storage::url($fileName);

        $data = [
            'nama' => $request->nama,
            'gambar' => $path,
            'deskripsi' => $request->deskripsi,
        ];

        $validator = Validator::make($data, $rules);
        if($validator->fails()){
            $errors = $validator->errors();
            return redirect()->route('alat.edit')->withErrors($errors)->withInput($request->all());
        } else{
            Alat::create($data);
            return redirect()->route('alat.index')
                ->with('success', 'Alat berhasil ditambahkan.');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Alat  $alat
     * @return \Illuminate\Http\Response
     */
    public function show(Alat $alat)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Alat  $alat
     * @return \Illuminate\Http\Response
     */
    public function edit(Alat $alat)
    {
        $data = $alat->get()->first();
        return view('pages.alat.editView', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Alat  $alat
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Alat $alat)
    {
        $rules = array(
            'nama' => 'required',
        );

        // Ngambil gambar lama
        $oldPhoto = Alat::where('id', $request->id)->first()->getOriginal('gambar');

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

        $data = [
            'nama' => $request->nama,
            'gambar' => $path,
            'deskripsi' => $request->deskripsi,
        ];

        $validator = Validator::make($data, $rules);
        if($validator->fails()){
            $errors = $validator->errors();
            return redirect()->route('alat.edit')->withErrors($errors)->withInput($request->all());
        } else{
            Alat::where('id', $request->id)->update($data);
            return redirect()->route('alat.index')
                ->with('success', 'Alat Baku berhasil diupdate.');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Alat  $alat
     * @return \Illuminate\Http\Response
     */
    public function destroy(Alat $alat)
    {
        //
    }
}

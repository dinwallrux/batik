<?php

namespace App\Http\Controllers;

use App\Motif;
use Image;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;

class MotifController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $number = 1;
        $datas = Motif::latest()->get();
        return view('pages.motif.index', compact('number', 'datas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.motif.createView');
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

        $data = [
            'nama' => $request->nama,
            'gambar' => $url
        ];

        $validator = Validator::make($data, $rules);
        if($validator->fails()){
            $errors = $validator->errors();
            return redirect()->route('motif.tambah')->withErrors($errors)->withInput($request->all());
        } else{
            Motif::create($data);
            return redirect()->route('motif.index')
                ->with('success', 'Motif berhasil ditambahkan.');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Motif  $motif
     * @return \Illuminate\Http\Response
     */
    public function show(Motif $motif)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Motif  $motif
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Motif::where('id', $id)->get()->first();
        return view('pages.motif.editView', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Motif  $motif
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $rules = array(
            'nama' => 'required',
            'gambar' => 'required',
        );

        // Ngambil gambar lama
        $oldPhoto = Motif::where('id', $request->id)->first()->getOriginal('gambar');

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
            'gambar' => $path
        ];

        $validator = Validator::make($data, $rules);
        if($validator->fails()){
            $errors = $validator->errors();
            return redirect()->route('motif.edit')->withErrors($errors)->withInput($request->all());
        } else{
            Motif::where('id', $request->id)->update($data);
            return redirect()->route('motif.index')
                ->with('success', 'Motif berhasil diupdate.');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Motif  $motif
     * @return \Illuminate\Http\Response
     */
    public function destroy(Motif $motif)
    {
        //
    }
}

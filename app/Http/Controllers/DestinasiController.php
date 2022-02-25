<?php

namespace App\Http\Controllers;

use App\Models\Destinasi;
use App\Models\Kategori;
use App\Models\Wilayah;
use Illuminate\Http\Request;
use Storage;

class DestinasiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $destinasi = Destinasi::with(['kategori', 'wilayah'])->get();
        return view('wisata.index', compact('destinasi'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $kategori = Kategori::select('id', 'nama')->get();
        $wilayah = Wilayah::select('id', 'nama_wilayah')->get();

        return view('wisata.tambah', compact('kategori', 'wilayah'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'kategori_id'   => 'not_in:0',
            'wilayah_id'    => 'not_in:0',
            'nama'          => 'required',
            'konten'        => 'required',
            'photo'         => 'required|mimes:jpg,png,jpeg',
        ]);

        $images = $request->file('photo')->store('content');
        Destinasi::create([
            'kategori_id'   => $request->kategori_id,
            'wilayah_id'    => $request->wilayah_id,
            'nama'          => $request->nama,
            'konten'        => $request->konten,
            'photo'         => $images,
        ]);

    return redirect()->route('wisata.index');
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
    public function edit(Destinasi $destinasi)
    {
        $kategori = Kategori::all();
        $wilayah = Wilayah::all();

        return view('wisata.edit', compact('destinasi', 'kategori', 'wilayah'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Destinasi $destinasi)
    {
        if($request->hasFile('photo')){
            $images = $request->file('photo')->store('content');
        } else {
            $images = $destinasi->photo;
        }
        $destinasi->update([
            'nama'          =>$request->get('nama'),
            'kategori_id'   =>$request->get('kategori_id'),
            'wilayah_id'    =>$request->get('wilayah_id'),
            'konten'        =>$request->get('konten'),
            'photo'         =>$images,

        ]);
        return redirect()->route('wisata.index', compact('destinasi'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Destinasi $destinasi)
    {
        $destinasi->delete();
        return redirect()->route('destinasi.index');
    }
}

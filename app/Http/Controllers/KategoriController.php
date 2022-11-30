<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use Illuminate\Http\Request;

class KategoriController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //semua data kategori
        $data = Kategori::all();
        return view('/kategori/kategori', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //menuju form create
        $data = Kategori::all();
        return view('/kategori/create', compact('data'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //tambah data kategori
        $validator = $request->validate([
            'nama_kategori' => 'required|string'
        ]);
        Kategori::create($validator);
        return redirect('/kategori')->with('success', 'berhasil tambah kategori');
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
        //menuju form edit
        $data = Kategori::findOrFail($id);
        return view('kategori/edit', compact('data'));
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
        //edit kategori
        $data = Kategori::findOrFail($id);
        $validator = $request->validate([
        'nama_kategori' => 'required|string'
        ]);
        $data->update($validator);
        return redirect('/kategori')->with('success', 'berhasil edit kategori');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //hapus kategori
        $data = Kategori::findOrFail($id);
        $data->delete();
        return redirect('/kategori')->with('error', 'berhasil hapus kategori');
    }
}

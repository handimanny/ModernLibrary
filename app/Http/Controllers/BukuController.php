<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use App\Models\Kategori;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BukuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //tampilan semua buku
        $data = Buku::all();
        return view('/buku/buku', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //ke form tambah buku
        $kategori = Kategori::all();
        $user = User::all();
        $data = Buku::all();
        return view('/buku/create', compact('data', 'kategori','user'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //buat buku
        // dd($request);
        $validator = $request->validate([
            'isbn' => 'required|string',
            'judul' => 'required|string',
            'sinopsis' => 'required|string',
            'penerbit' => 'required|string',
            'cover' => 'required|image',
            'user_id' => 'string',
            'kategori_id' => 'string'
          ]);
          $validator['cover'] = $request->file('cover')->store('img');
          Buku::create($validator);
          return redirect('/buku')->with('success', 'berhasil buat buku');
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
        $data = Buku::findOrFail($id);
        $kategori = Kategori::all();
        $user = User::all();
        return view('buku/edit', compact('data','kategori','user'));
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
        //edit buku
        $data = Buku::findOrFail($id);
        if ($request->file('cover')) {
            $file = $request->file('cover')->store('img');
            if ($request->cover){
                Storage::delete($data->cover);
            }
            $data->update([
                'isbn' => $request->isbn,
                'judul' => $request->judul,
                'sinopsis' => $request->sinopsis,
                'penerbit' => $request->penerbit,
                'cover' => $file,
                'user_id' => $request->user_id,
                'kategori_id' => $request->kategori_id,
            ]);
        } else {
            $data->update([
                'isbn' => $request->isbn,
                'judul' => $request->judul,
                'sinopsis' => $request->sinopsis,
                'penerbit' => $request->penerbit,
                'cover' => $data->cover,
                'user_id' => $request->user_id,
                'kategori_id' => $request->kategori_id,
            ]);
        }
        return redirect('/buku')->with('success', 'berhasil edit buku');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //hapus buku
        $data = Buku::findOrFail($id);
        if($data->cover){
            Storage::delete($data->cover);
        }
        $data->delete();
        return redirect('/buku')->with('error', 'berhasil hapus buku');
    }
}

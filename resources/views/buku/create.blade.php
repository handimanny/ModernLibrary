@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Buku/Buat') }}</div>

                <div class="card-body">
                    
                <form action="{{url('buku')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                <div class="mb-3">
                    <label for="isbn" class="form-label @error('isbn') is-invalid @enderror">Tambah ISBN</label>
                    <input type="text" class="form-control" name="isbn" id="isbn" placeholder="Input ISBN" >
                    @error('isbn')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="judul" class="form-label @error('judul') is-invalid @enderror">Tambah Judul</label>
                    <input type="text" class="form-control" name="judul" id="judul" placeholder="Input Judul" >
                    @error('judul')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="sinopsis" class="form-label @error('sinopsis') is-invalid @enderror">Tambah Sinopsis</label>
                    <input type="text" class="form-control" name="sinopsis" id="sinopsis" placeholder="Input Sinopsis" >
                    @error('sinopsis')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="penerbit" class="form-label @error('penerbit') is-invalid @enderror">Tambah Penerbit</label>
                    <input type="text" class="form-control" name="penerbit" id="penerbit" placeholder="Input Penerbit" >
                    @error('penerbit')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="cover" class="form-label">Tambah Cover</label>
                    <img class="img-preview img-fluid mb-3 col-sm-5" >
                    <input class="form-control" type="file" id="cover" name="cover" onchange="previewImage()">
                </div>
                <div class="mb-3">
                <label for="user_id" class="form-label">Tambah Penambah</label>
                <select class="form-control" id="user_id" name="user_id" enctype="multipart/form-data">
                <option selected>Open this select menu</option>
                    @foreach ($user as $file)
                    <option value="{{$file->id}}" @selected(old('user_id')==$file->id)>{{$file->name}}</option>
                    @endforeach
                </select>
                </div>
                <div class="mb-3">
                <label for="kategori_id" class="form-label">Tambah Kategori</label>
                <select class="form-control" id="kategori_id" name="kategori_id" enctype="multipart/form-data">
                <option selected>Open this select menu</option>
                    @foreach ($kategori as $file)
                    <option value="{{$file->id}}" @selected(old('kategori_id')==$file->id)>{{$file->nama_kategori}}</option>
                    @endforeach
                </select>
                </div>
                <button type="submit" class="btn btn-outline-primary">Submit</button>
                </form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Buku') }}</div>

                <div class="card-body">
                    
                <a href="buku/create" class="btn btn-outline-primary" >Tambah Buku</a>
                      <table class="table">
                          <thead>
                              <tr>
                              <th scope="col">#</th>
                              <th scope="col">ISBN</th>
                              <th scope="col">Judul</th>
                              <th scope="col">Sinopsis</th>
                              <th scope="col">Penerbit</th>
                              <th scope="col">Cover</th>
                              <th scope="col">Kategori</th>
                              <th scope="col">Menambahkan</th>
                              <th scope="col">Aksi</th>
                              </tr>
                          </thead>
                          <tbody>
                              @foreach ($data as $file)
                              <tr>
                              <th scope="row">{{$loop->iteration}}</th>
                              <td>{{$file['isbn']}}</td>
                              <td>{{$file['judul']}}</td>
                              <td>{{$file['sinopsis']}}</td>
                              <td>{{$file['penerbit']}}</td>
                              <td>
                                <img src="{{ asset('storage/'.$file->cover) }}" width="100px" alt="">
                              </td>
                              <td>{{$file->kategori->nama_kategori}}</td>
                              <td>{{$file->user->name}}</td>
                              <td>
                              <a href="{{url('buku/'.$file->id.'/edit')}}" class="btn btn-outline-success" >Edit</a>
                              |
                              <a href="{{url('deletebuku/'.$file->id)}}" class="btn btn-outline-danger" >Hapus</a>
                              </td>
                              </tr>
                              @endforeach
                          </tbody>
                      </table>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Halaman') }}</div>

                <div class="card-body">
                    
                <div class="container">
                    <div class="row">
                        @foreach ($data as $file)
                        <div class="col-lg-4 mt-2">
                            <div class="card">
                                <div style="max-height:100px; overflow:hidden;" >
                                    <img src="{{ asset('storage/'. $file->cover) }}" class="card-img-top" alt="">
                                </div>
                                <div class="card-body">
                                    <h6 class="card-title">ISBN : {{ $file->isbn }}</h6>
                                    <h6 class="card-title">Judul : {{ $file->judul }}</h6>
                                    <h6 class="card-title">Sinopsis : {{ $file->sinopsis }}</h6>
                                    <h6 class="card-title">Penerbit : {{ $file->penerbit }}</h6>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection

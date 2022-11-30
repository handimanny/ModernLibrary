@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Kategori/Edit') }}</div>

                <div class="card-body">
                    
                <form action="{{url('kategori/'.$data->id)}}" method="POST" >
                    @csrf
                    @method('PUT')
                <div class="mb-3">
                    <label for="nama_kategori" class="form-label">Edit Name</label>
                    <input type="text" class="form-control" id="nama_kategori" name="nama_kategori" placeholder="Input Kategori" value="{{$data->nama_kategori}}" >
                </div>
                <button type="submit" class="btn btn-outline-primary">Submit</button>
                </form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection

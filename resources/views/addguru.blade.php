@extends('layout.v_template')
@section('content')
<form action="/guru/insert" method="post" enctype="multipart/form-data">
    @csrf
    <div class="row">
        <div class="col-6">
            <div class="form-group">
                <label for="">Nama</label>
                <input name="nama_guru" type="text" class="form-control @error ('nama_guru') is-invalid @enderror" value="{{old('mapel_guru')}}">
                <div class="text-danger">
                    @error('nama_guru')
                        {{$message}}
                    @enderror
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-6">
            <div class="form-group">
                <label for="">Mapel</label>
                <input name="mapel_guru" type="text" class="form-control @error ('mapel_guru') is-invalid @enderror" value="{{old('mapel_guru')}}">
                <div class="text-danger">
                    @error('mapel_guru')
                        {{$message}}
                    @enderror
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-6">
            <div class="form-group">
                <label for="">Foto</label>
                <input name="foto_guru" type="file" class="form-control @error ('foto_guru') is-invalid @enderror">
                <div class="text-danger">
                    @error('foto_guru')
                        {{$message}}
                    @enderror
                </div>
            </div>
        </div>
    </div>
   <div class="form-group">
   <button class="btn btn-primary">Simpan</button>
   </div>
</form>

@endsection

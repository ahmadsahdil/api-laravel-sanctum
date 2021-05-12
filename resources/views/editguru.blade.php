@extends('layout.v_template')
@section('content')
<form action="/guru/update/{{$guru->id_guru}}" method="post" enctype="multipart/form-data">
    @csrf
    <div class="row">
        <div class="col-6">
            <div class="form-group">
                <label for="">Nama</label>
                <input name="nama_guru" type="text" class="form-control @error ('nama_guru') is-invalid @enderror" value="{{$guru->nama_guru}}" readonly>
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
                <input name="mapel_guru" type="text" class="form-control @error ('mapel_guru') is-invalid @enderror" value="{{$guru->mapel_guru}}">
                <div class="text-danger">
                    @error('mapel_guru')
                        {{$message}}
                    @enderror
                </div>
            </div>
        </div>
    </div>
    <div class="col-sm 12">
    <div class="col-sm-6">
    <img src="{{url('foto-guru/'.$guru->foto_guru)}}" alt="" width="50px" height="70px">
    </div>
        <div class="col-sm-6">
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
   <button class="btn btn-primary">Edit</button>
   </div>
</form>

@endsection

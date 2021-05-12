@extends('layout.v_template')
@section('content')
          <table>
          <tr>
          <th>Nama:</th>
          <th>{{ $guru->nama_guru }}</th>
           </tr>
          <tr><th>Mapel:</th> <th>{{ $guru->mapel_guru }}</th></tr>
          <tr><th>Foto</th><th><img src="{{ url('foto-guru/'.$guru->foto_guru) }}" alt="" srcset=""></th></tr>
          <tr><a href="/guru" class="btn btn-small btn-success">Kembali</a></tr>
          </table>

@endsection
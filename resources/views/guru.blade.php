@extends('layout.v_template')
@section('content')
<a href="/guru/add" class="btn btn-sm btn-primary">Tambah</a>
@if (session('pesan'))
<div class="alert alert-success alert-dismissible">
<button type="button" class="close" data-dismiss="alert" aria-hidden="true"> </button>
<h4><i class="icon fa fa-check"></i>Success</h4>
{{session('pesan')}}
</div>
@endif
          <table>
          <thead>
          <tr>
          <th>No</th>
          <th>Nama</th>
          <th>Mapel</th>
          <th>Foto</th>
          <th>Aksi</th>
          </tr>
          </thead>
          <tbody>
          <?php $no = 1; ?>
          @foreach ($guru as $data)
          <tr>
          <td>{{$no++}}</td>
          <td>{{ $data->nama_guru }}</td>
          <td>{{ $data->mapel_guru}}</td>
          <td><img src="{{ url('foto-guru/'.$data->foto_guru) }}" width="50px" height="70px"></td>
          <td>
          <a href="/guru/detail/{{$data->id_guru}}" class="btn btn-sm btn-success">Detail</a>
          <a href="/guru/edit/{{$data->id_guru}}" class="btn btn-sm btn-warning">Edit</a>
          <button type="button" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#delete{{ $data->id_guru }}">
  Delete
</button>
          </td>
          </tr>

          @endforeach
          </tbody>

          </table>
@foreach ($guru as $data)
                  <!-- Modal -->
<div class="modal fade" id="delete{{ $data->id_guru }}" tabindex="-1" role="dialog" aria-labelledby="deleteLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="deleteLabel">{{ $data->nama_guru }}</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
       Yakin menghapus Data {{ $data->nama_guru }} ?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <a class="btn btn-danger" href="/guru/delete/{{ $data->id_guru }}">Yes</a>
      </div>
    </div>
  </div>
</div> 
@endforeach
@endsection
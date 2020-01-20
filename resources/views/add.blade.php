@extends('coba')

@section('konten')
<div class="card uper">
  <div class="card-header">
    Form Tambah Data
  </div>
  <div class="card-body">
    @if ($errors->any())
      <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
        </ul>
      </div><br/>
    @endif
      <form method="post" action="add" enctype="multipart/form-data">
        @csrf
          <div class="form-group"> 
              <label>Nama</label>
              <input type="text" class="form-control" name="p_name"/>
          </div>
          <div class="form-group">
              <label>Barcode</label>
              <input type="text" class="form-control" name="p_barcode"/>
          </div>
          <div class="form-group">
              <label>Gambar</label>
              <input type="file" class="form-control" name="p_avatar"/>
          </div>
          <div class="form-group">
              <label>Harga</label>
              <input type="text" class="form-control" name="p_harga_standar"/>
          </div>
          <button type="submit" class="btn btn-primary">Tambah Data</button>
      </form>
  </div>
</div>
@endsection
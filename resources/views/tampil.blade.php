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
      <form method="post" action="{{ route('coba.store') }}">
        @csrf
          <div class="form-group"> 
              <label>Nama</label>
              <input type="text" class="form-control" name="nama"/>
          </div>
          <div class="form-group">
              <label>Email</label>
              <input type="email" class="form-control" name="email"/>
          </div>
          <div class="form-group">
              <label>Tempat Lahir</label>
              <input type="text" class="form-control" name="tempat_lahir"/>
          </div>
          <div class="form-group">
              <label>Tanggal Lahir</label>
              <input type="date" class="form-control" name="tanggal_lahir"/>
          </div>
          <div class="form-group">
              <label>Gender</label>
              <div class="form-group">
                <input type="radio" name="gender" value="Pria"> Pria<br>
                <input type="radio" name="gender" value="Wanita"> Wanita
              </div>
          </div>
          <div class="form-group">
              <label>Alamat</label>
              <textarea class="form-control" name="alamat"></textarea>
          </div>
          <button type="submit" class="btn btn-primary">Tambah Data</button>
      </form>
  </div>
</div>
@endsection
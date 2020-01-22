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
      <form method="post" action="{{url('toko/add')}}">
        @csrf
          <div class="form-group"> 
              <label>Nama Toko</label>
              <input type="text" class="form-control" name="t_name"/>
          </div>
          <div class="form-group">
              <label>Toko Long</label>
              <input type="text" class="form-control" name="t_long"/>
          </div>
          <div class="form-group">
              <label>Toko Lat</label>
              <input type="text" class="form-control" name="t_lat"/>
          </div>
          <div class="form-group">
              <label>Radius</label>
              <input type="text" class="form-control" name="t_radius_toko"/>
          </div>
          <button type="submit" class="btn btn-primary">Tambah Data</button>
      </form>
  </div>
</div>
@endsection
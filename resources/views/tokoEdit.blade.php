<!-- {{url('toko/add')}} -->
@extends('coba')
   
@section('konten')
<div class="card uper">
  <div class="card-header">
    Form Edit Data
  </div>
  <div class="card-body">
    <form action="/toko/save" method="post">
        @csrf
            <div class="form-group"> 
              <label>Nama Toko</label>
              <input type="text" class="form-control" name="t_name" value="{{ $toko->t_name}}"/>
            </div>
            <div class="form-group"> 
              <label>Toko Long</label>
              <input type="text" class="form-control" name="t_long" value="{{ $toko->t_long}}"/>
            </div>
            <div class="form-group"> 
              <label>Toko Lat</label>
              <input type="text" class="form-control" name="t_lat" value="{{ $toko->t_lat}}"/>
            </div>
            <div class="form-group"> 
              <label>Radius Toko</label>
              <input type="text" class="form-control" name="t_radius_toko" value="{{ $toko->t_radius_toko}}"/>
            </div>
              <input type="hidden" name="t_id" value="{{$toko->t_id}}"/>
          <button type="submit" class="btn btn-primary">Edit Data</button>
        </div>
   
    </form>
  </div>
</div>
@endsection
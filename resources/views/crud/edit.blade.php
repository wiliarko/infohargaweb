@extends('coba')
   
@section('konten')
<div class="card uper">
  <div class="card-header">
    Form Edit Data
  </div>
  <div class="card-body">
    <form action="/crud/save" method="post">
        @csrf
            <div class="form-group"> 
              <label>Nama Barang</label>
              <input type="text" class="form-control" name="p_name" value="{{ $product->p_name}}"/>
            </div>
            <div class="form-group"> 
              <label>Barcode</label>
              <input type="text" class="form-control" name="p_barcode" value="{{ $product->p_barcode}}"/>
            </div>
            <div class="form-group"> 
              <label>Gambar</label>
              <input type="file" class="form-control" name="p_avatar" value="{{ $product->p_avatar}}"/>
            </div>
            <div class="form-group"> 
              <label>Harga</label>
              <input type="text" class="form-control" name="p_harga_standar" value="{{ $product->p_harga_standar}}"/>
            </div>
              <input type="hidden" name="p_id" value="{{$product->p_id}}"/>
          <button type="submit" class="btn btn-primary">Edit Data</button>
        </div>
   
    </form>
  </div>
</div>
@endsection
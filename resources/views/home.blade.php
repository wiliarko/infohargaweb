@extends('coba')
 
@section('konten')
  @if(session()->get('success'))
    <div class="alert alert-success">
      {{ session()->get('success') }}  
    </div><br/>
  @endif
  
  <table class="table table-striped border text-center">
    <thead>
        <tr>
          <td>No</td>
          <td>Barcode</td>
          <td>Nama Barang</td>
          <td>Gambar Barang</td>
          <td>Harga Barang</td>
          <td colspan="2">Kelola Data</td>
        </tr>
    </thead>
    <tbody>
       <?php $i =1 ?>
        @foreach($product as $user)
        <tr>
            <td>{{$i}}</td>
            <td>{{$user->p_barcode}}</td>
            <td>{{$user->p_name}}</td>
            <td>{{$user->p_avatar}}</td>
            <td>{{$user->p_harga_standar}}</td>
            <td><a href="product/{{$user->p_id}}/edit" class="btn btn-warning">Edit</a></td>
            <td><a href="product/{{$user->p_id}}/delete" class="btn btn-danger">Delete</a>
            </td>
        </tr>
        <?php $i++ ?>
        @endforeach
    </tbody>
  </table>
  <center><a class="btn btn-primary" href="{{url('product/add')}}">Tambah</a></center>
@endsection
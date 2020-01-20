@extends('coba')
 
@section('konten')
  @if(session()->get('success'))
    <div class="alert alert-success">
      {{ session()->get('success') }}  
    </div><br/>
  @endif
    <a class="nav-item nav-link" href="{{url('add')}}">Tambah</a>
    <a class="nav-item nav-link" href="{{url('/crud/daftar')}}">Chat</a>
  <table class="table table-striped border text-center">
    <thead>
        <tr>
          <td>No</td>
          <td>Barcode</td>
          <td>Nama Barang</td>
          <td>Gambar Barang</td>
          <td>Harga Barang</td>
        </tr>
    </thead>
    <tbody>
       <?php $i =1 ?>
        @foreach($cek as $user)
        <tr>
            <td>{{$i}}</td>
            <td>{{$user->p_barcode}}</td>
            <td>{{$user->p_name}}</td>
            <td>{{$user->p_avatar}}</td>
            <td>{{$user->p_harga_standar}}</td>
        </tr>
        <?php $i++ ?>
        @endforeach
    </tbody>
  </table>
@endsection
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
          <td>Nama Toko</td>
          <td>Toko Long</td>
          <td>Toko Lat</td>
          <td>Radius</td>
          <td colspan="2">Kelola Data</td>
        </tr>
    </thead>
    <tbody>
       <?php $i =1 ?>
        @foreach($toko as $t)
        <tr>
            <td>{{$i}}</td>
            <td>{{$t->t_name}}</td>
            <td>{{$t->t_long}}</td>
            <td>{{$t->t_lat}}</td>
            <td>{{$t->t_radius_toko}}</td>
            <td><a href="toko/{{$t->t_id}}/edit" class="btn btn-warning">Edit</a></td>
            <td><a href="toko/{{$t->t_id}}/delete" class="btn btn-danger">Delete</a>
            </td>
        </tr>
        <?php $i++ ?>
        @endforeach
    </tbody>
  </table>
  <center><a class="btn btn-primary" href="{{url('toko/add')}}">Tambah</a></center>
@endsection
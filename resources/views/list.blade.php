@extends('coba')
 
@section('konten')
  @if(session()->get('success'))
    <div class="alert alert-success">
      {{ session()->get('success') }}  
    </div><br/>
  @endif
  <a href="{{ route('coba.create')}}" class="btn btn-primary">Tambah</a></td><br><br>
  <table class="table table-striped border text-center">
    <thead>
        <tr>
          <td>No</td>
          <td>Nama</td>
          <td colspan="2">Kelola Data</td>
        </tr>
    </thead>
    <tbody>
        @foreach($coba as $user)
        <tr>
            <td>{{$user->id}}</td>
            <td>{{$user->nama}}</td>
            <td><a href="{{ route('coba.edit', $user->id)}}" class="btn btn-warning">Edit</a></td>
            <td>
              <form action="{{ route('coba.destroy', $user->id)}}" method="post">
                @csrf
                @method('DELETE')
                <button class="btn btn-danger" type="submit">Delete</button>
              </form>
            </td>
        </tr>
        @endforeach
    </tbody>
  </table>
@endsection
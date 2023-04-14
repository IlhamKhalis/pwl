@extends('mahasiswas.layout')
@section('content')
 <div class="row">
 <div class="col-lg-12 margin-tb">
 <div class="pull-left mt-2">
 <h2>JURUSAN TEKNOLOGI INFORMASI-POLITEKNIK NEGERI MALANG</h2>
 </div>
 
 <form class="row mb-3 mt-5" action="{{ route('cariMahasiswa') }}" method="POST">
 @csrf
 <div class="col-md-6">
 <div class="d-flex flex-row">
 <input type="text" value="{{ (request()->cari) ? request()->cari : '' }}" name="cari" class="form-control" placeholder="cari mahasiswa">
 <button type="submit" class="btn btn-primary ml-4">Cari</button>
 </div>
 </div>
 <div class="col-md-6 d-flex flex-row justify-content-end">
 <a class="btn btn-success" href="{{ route('mahasiswas.create') }}"> Input Mahasiswa</a>
 </div>
 </form>
 </div>
 </div>
 
 @if ($message = Session::get('success'))
 <div class="alert alert-success">
 <p>{{ $message }}</p>
 </div>
 @endif
 
 <table class="table table-bordered">
 <tr>
 <th>Nim</th>
 <th>Nama</th>
 <th>Kelas</th>
 <th>Jurusan</th>
 <th>No Handphone</th>
 <th>Email</th>
 <th>Tanggal_Lahir</th>
 <th width="280px">Action</th>
 </tr>
 @foreach ($mahasiswas as $Mahasiswa)
 <tr>
 
 <td>{{ $Mahasiswa->Nim }}</td>
 <td>{{ $Mahasiswa->Nama }}</td>
 <td>{{ $Mahasiswa->Kelas }}</td>
 <td>{{ $Mahasiswa->Jurusan }}</td>
 <td>{{ $Mahasiswa->No_Handphone }}</td>
 <td>{{ $Mahasiswa->Email }}</td>
 <td>{{ $Mahasiswa->Tanggal_Lahir }}</td>
 <td>
 <form action="{{ route('mahasiswas.destroy',$Mahasiswa->Nim) }}" method="POST">
 
 <a class="btn btn-info" href="{{ route('mahasiswas.show',$Mahasiswa->Nim) }}">Show</a>
 <a class="btn btn-primary" href="{{ route('mahasiswas.edit',$Mahasiswa->Nim) }}">Edit</a>
 @csrf
 @method('DELETE')
 <button type="submit" class="btn btn-danger">Delete</button>
 </form>
 </td>
 </tr>
 @endforeach
 </table>
@endsection

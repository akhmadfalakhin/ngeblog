@extends('includes.home')
@section('subjudul', 'Kategori')
@section('content')
    @if (Session::has('success'))
        <div class="alert alert-success" role="alert">
        {{ Session('success') }}
        </div>
    @endif
   
    <a href="{{ route('category.create') }}" class="btn btn-info btn-sm"><i class="fas fa-plus-square"></i> Tambah Kategori</a><br>
    <table class="table table-striped table-hover table-sm table-bordered mt-3">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Kategori</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($category as $result => $hasil)
            <tr>
                <td>{{ $result + $category->firstitem() }}</td>
                <td>{{ $hasil->name }}</td>
                <td>
                    <a href="{{ route('category.edit', $hasil->id) }}" class="btn btn-primary btn-sm">Edit</a>
                    <a href="{{ route('category.destroy', $hasil->id) }}" class="btn btn-danger btn-sm">Delete</a>
                </td>
            </tr>    
            @endforeach
        </tbody>
    </table>
    
  
@endsection
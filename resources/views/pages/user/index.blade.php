@extends('includes.home')
@section('subjudul', 'User')
@section('content')
    @if (Session::has('success'))
        <div class="alert alert-success" role="alert">
        {{ Session('success') }}
        </div>
    @endif
   
    <a href="{{ route('user.create') }}" class="btn btn-info btn-sm"><i class="fas fa-plus-square"></i> Tambah User</a><br>
    <table class="table table-striped table-hover table-sm table-bordered mt-3">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama</th>
                <td>Email</td>
                <td>tipe</td>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($user as $result => $hasil)
            <tr>
                <td>{{ $result + $user->firstitem() }}</td>
                <td>{{ $hasil->name }}</td>
                <td>{{ $hasil->email }}</td>
                <td>
                    @if ($hasil->tipe)
                       <span class="badge badge-info">Administrator</span> 
                    @else
                        <span class="badge badge-warning">Author</span>
                    @endif
                </td>
                <td>
                    <a href="{{ route('user.edit', $hasil->id) }}" class="btn btn-primary btn-sm">Edit</a>
                    <form class="d-inline" action="{{ route('user.destroy', $hasil->id) }}" method="POST">
                        @csrf
                        @method('delete')
                        <button type="submit"  class="btn btn-danger btn-sm">Delete</button>
                    </form>
                </td>
            </tr>    
            @endforeach
        </tbody>
    </table>
    {{ $user->links() }}
    
  
@endsection
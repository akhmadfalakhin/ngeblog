@extends('includes.home')
@section('subjudul', 'Post')
@section('content')
    @if (Session::has('success'))
        <div class="alert alert-success" role="alert">
        {{ Session('success') }}
        </div>
    @endif
   
    <a href="{{ route('post.create') }}" class="btn btn-info btn-sm"><i class="fas fa-plus-square"></i> Tambah Post</a><br>
    <table class="table table-striped table-hover table-sm table-bordered mt-3">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Post</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($post as $result => $hasil)
            <tr>
                <td>{{ $result + $post->firstitem() }}</td>
                <td>{{ $hasil->name }}</td>
                <td>
                    <a href="{{ route('post.edit', $hasil->id) }}" class="btn btn-primary btn-sm">Edit</a>
                    <form class="d-inline" action="{{ route('post.destroy', $hasil->id) }}" method="POST">
                        @csrf
                        @method('delete')
                        <button type="submit"  class="btn btn-danger btn-sm">Delete</button>
                    </form>
                </td>
            </tr>    
            @endforeach
        </tbody>
    </table>
    {{ $post->links() }}
    
  
@endsection
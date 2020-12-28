@extends('includes.home')
@section('subjudul', 'Tag')
@section('content')
    @if (Session::has('success'))
        <div class="alert alert-success" role="alert">
        {{ Session('success') }}
        </div>
    @endif
   
    <a href="{{ route('tag.create') }}" class="btn btn-info btn-sm"><i class="fas fa-plus-square"></i> Tambah Tag</a><br>
    <table class="table table-striped table-hover table-sm table-bordered mt-3">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Tag</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($tag as $result => $hasil)
            <tr>
                <td>{{ $result + $tag->firstitem() }}</td>
                <td>{{ $hasil->name }}</td>
                <td>
                    <a href="{{ route('tag.edit', $hasil->id) }}" class="btn btn-primary btn-sm">Edit</a>
                    <form class="d-inline" action="{{ route('tag.destroy', $hasil->id) }}" method="POST">
                        @csrf
                        @method('delete')
                        <button type="submit"  class="btn btn-danger btn-sm">Delete</button>
                    </form>
                </td>
            </tr>    
            @endforeach
        </tbody>
    </table>
    {{ $tag->links() }}
    
  
@endsection
@extends('includes.home')
@section('subjudul', 'Post Yang Terhapus')
@section('content')
    @if (Session::has('success'))
        <div class="alert alert-success" role="alert">
        {{ Session('success') }}
        </div>
    @endif
   
    
    <table class=" table table-striped table-hover  table-sm border border-darken-1">
        <thead >
            <tr>
                <th>No</th>
                <th>Nama Post</th>
                <td>Kategori</td>
                <td>Tag</td>
                <th>Thumbnail</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($post as $result => $hasil)
            <tr>
                <td>{{ $result + $post->firstitem() }}</td>
                <td>{{ $hasil->judul }}</td>
                <td>{{ $hasil->category->name }}</td>
                <td>@foreach ($hasil->tags as $tag)
                    <ul>
                        <li>{{ $tag->name }}</li>
                    </ul>
                @endforeach</td>
                <td><img src="{{ asset( $hasil->gambar) }}" style="width: 80px" class="img-fluid" alt=""></td>
                <td>
                    <a href="{{ route('post.restore', $hasil->id) }}" class="btn btn-info btn-sm">Restore</a>
                    <form class="d-inline" action="{{ route('post.kill', $hasil->id) }}" method="POST">
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
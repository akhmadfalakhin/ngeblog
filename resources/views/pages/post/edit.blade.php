@extends('includes.home')
@section('subjudul', 'Edit Post')
@section('content')
  @if (count($errors)>0)
    @foreach ($errors->all() as $error)
      <div class="alert alert-danger" role="alert">
        {{ $error }}
      </div>
    @endforeach
  @endif
 
  @if (Session::has('success'))
    <div class="alert alert-success" role="alert">
     {{ Session('success') }}
    </div>
  @endif
        
<form action="{{ route('post.update', $post->id) }}" method="POST"  enctype="multipart/form-data">
    @csrf
  @method('PUT')
    <div class="form-group">
        <label>Judul</label>
        <input type="text" class="form-control" name="judul" placeholder="Masukkan Post" value="{{ $post->judul }}">
    </div>
  
    <div class="form-group">
        <label>Kategori</label>
        <select name="category_id" id="" class="form-control">
            <option value="" holder>Pilih Kategori</option>
            @foreach ($category as $result)
            <option value="{{ $result->id }}"
                @if ($post->category_id == $result->id)
                    selected                    
                @endif
                >{{ $result->name }}</option>
            @endforeach
        </select>
    </div>
    <div class="form-group">
        <label>Pilih Tag</label><br>
        <select class="d-inline selectpicker" multiple="" name="tags[]">
          @foreach ($tags as $tag)
          <option value="{{ $tag->id }}"
            @foreach ($post->tags as $value)
              @if ($tag->id == $value->id)
                  selected
              @endif  
            @endforeach
            >{{ $tag->name }}</option>
              
          @endforeach
          
        </select>
    </div>       
  
    <div class="form-group">
        <label>Kontent</label>
        <textarea name="content" id="content" class="form-control"  value="">{{ $post->content }}</textarea>
    </div>
  
    <div class="form-group">
        <label>Thumbnail</label>
        <input type="file"  name="gambar" class="form-control">
    </div>

    <div class="form-group">
        <button class="btn btn-primary  btn-block">update Post</button>
    </div>
</form>
  
@endsection
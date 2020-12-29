@extends('includes.home')
@section('subjudul', 'Tambah Post')
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
        
<form action="{{ route('post.store') }}" method="POST"  enctype="multipart/form-data">
    @csrf
  
    <div class="form-group">
        <label>Judul</label>
        <input type="text" class="form-control" name="judul" placeholder="Masukkan Post">
    </div>
  
    <div class="form-group">
        <label>Kategori</label>
        <select name="category_id" id="" class="form-control">
            <option value="" holder>Pilih Kategori</option>
            @foreach ($category as $result)
            <option value="{{ $result->id }}">{{ $result->name }}</option>
            @endforeach
        </select>
    </div>
    <div class="form-group">
        <label>Pilih Tag</label><br>
        <select class="d-inline selectpicker" multiple="" name="tags[]">
          @foreach ($tags as $tag)
          <option value="{{ $tag->id }}">{{ $tag->name }}</option>
              
          @endforeach
          
        </select>
    </div>       
  
    <div class="form-group">
        <label>Kontent</label>
        <textarea name="content" id="content" class="ckeditor form-control"></textarea>
    </div>
  
    <div class="form-group">
        <label>Thumbnail</label>
        <input type="file"  name="gambar" class="form-control">
    </div>

    <div class="form-group">
        <button class="btn btn-primary  btn-block">Simpan Post</button>
    </div>
</form>
  
@endsection
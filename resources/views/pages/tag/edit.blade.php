@extends('includes.home')
@section('subjudul', 'Edit Tag')
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
        
<form action="{{ route('tag.update', $tag->id) }}" method="POST" >
    @csrf
    @method('PUT')
  <div class="card-body">
    <div class="form-group">
    <label>Tag</label>
    <input type="text" class="form-control" name="name" value="{{ $tag->name }}" placeholder="Masukkan Tag">
  </div>

  <div class="form-group">
    <button class="btn btn-primary  btn-block">Update Tag</button>
  </div>
</form>
  
@endsection
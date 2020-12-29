@extends('blog.content')
@section('content')
<div class="col-md-8">
	@foreach ($data as $list)
	<div class="mb-5 post post-row ">
		<a class="post-img" href="{{ route('blog.isi', $list->slug) }}"><img src="{{ asset($list->gambar) }}" alt=""></a>
		<div class="post-body">
			<div class="post-category">
				<a href="category.html">{{ $list->category->name }}</a>
			</div>
			<h3 class="post-title"><a href="blog-post.html">{{ $list->judul }}</a></h3>
			<ul class="post-meta">
				<li><a href="author.html">{{ $list->user->name }}</a></li>
				<li>{{ $list->created_at->diffforHumans() }}</li>
			</ul>
		</div>
	</div>
	<br>
	<!-- /post -->
		
	@endforeach			
	<center>

		{{ $data->links() }}
	</center>
</div>
	
@endsection
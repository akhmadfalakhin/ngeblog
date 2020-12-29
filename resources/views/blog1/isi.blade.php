@extends('blog.content')
@section('content')
    @foreach ($data as $isi)
    <div id="post-header" class="page-header mb-3">
			<div class="page-header-bg" style="
			background-image: url( {{asset($isi->gambar) }} );" 

			data-stellar-background-ratio="0.5"></div>
			<div class="container">
				<div class="row">
					<div class="col-md-10">
						<div class="post-category">
							<a href="category.html">{{ $isi->category->name }}</a>
						</div>
						<h1>{{ $isi->judul }}</h1>
						<ul class="post-meta">
							<li><a href="author.html">{{ $isi->user->name }}</a></li>
							<li>{{ $isi->created_at->diffforHumans() }}</li>
						
							<!-- <li><i class="fa fa-eye"></i> 807</li> -->
						</ul>
					</div>
				</div>
			</div>
        </div>
        
		<!-- /PAGE HEADER -->
    </header>
    <div class="col-md-8 hot-post-left">
	<br>
        {!! $isi->content !!}        
    @endforeach
    </div>
@endsection
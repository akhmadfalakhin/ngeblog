@include('blog.head')
    <div class="section">
		<!-- container -->
		<div class="container">
            <!-- row -->
            <div id="hot-post" class="row hot-post">
	            <div class="col-md-8 hot-post-left">
		<!-- post -->
                    @yield('content')
                </div>
                    @include('blog.widget')
                
        </div>
		<!-- /container -->
	</div>
    <!-- /SECTION -->

@include('blog.footer')
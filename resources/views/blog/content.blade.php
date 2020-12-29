@include('blog.head')
    <div class="section">
		<!-- container -->
		<div class="container">
            <!-- row -->
            <div id="hot-post" class="row hot-post">
	            
		<!-- post -->
                    @yield('content')
               
                    @include('blog.widget')
                
        </div>
		<!-- /container -->
	</div>
    <!-- /SECTION -->

@include('blog.footer')
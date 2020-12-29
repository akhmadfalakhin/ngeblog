 <div class="main-sidebar">
        <aside id="sidebar-wrapper">
          <div class="sidebar-brand">
            <a href="index.html">Blog</a>
          </div>
          <div class="sidebar-brand sidebar-brand-sm">
            <a href="index.html">St</a>
          </div>
          <ul class="sidebar-menu">
              <li class="menu-header">Dashboard</li>
              <li class="active"><a class="nav-link" href="{{ route('dashboard') }}"><i class="fas fa-tachometer-alt"></i></i> <span>Dashboard</span></a></li>
              <li class="menu-header">Starter</li>
              <li class="nav-item dropdown">
                <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class='bx bx-repost' ></i><span>Post</span></a>
                <ul class="dropdown-menu">
                  <li><a class="nav-link" href="{{ route('post.index') }}">List Post</a></li>
                  <li><a class="nav-link" href="{{ route('post.tampil_hapus') }}">List Post terhapus</a></li>
                </ul>
              </li>
              <li class="nav-item dropdown">
                <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class='bx bxs-category-alt' ></i><span>Kategori</span></a>
                <ul class="dropdown-menu">
                  <li><a class="nav-link" href="{{ route('category.index') }}">List Kategori</a></li>
                  <li><a class="nav-link" href="{{ route('category.create') }}">Tambah Kategori</a></li>
                </ul>
              </li>
              <li class="nav-item dropdown">
                <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class='bx bxs-tag-alt' ></i> <span>Tag</span></a>
                <ul class="dropdown-menu">
                  <li><a class="nav-link" href="{{ route('tag.index') }}">List Tag</a></li>
                </ul>
              </li>
               <li class="nav-item dropdown">
                <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class='bx bxs-user-circle'></i> <span>User</span></a>
                <ul class="dropdown-menu">
                  <li><a class="nav-link" href="{{ route('user.index') }}">List User</a></li>
                </ul>
              </li>   
        </aside>
</div>
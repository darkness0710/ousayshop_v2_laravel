<div class="sidebar">
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
            <img src="{{ asset('images/user_default.jpg') }}" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
            <a href="#" class="d-block">{{ Auth::guard('admin')->user()->name }}</a>
        </div>
    </div>
    <div class="form-inline">
        <div class="input-group" data-widget="sidebar-search">
            <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
            <div class="input-group-append">
                <button class="btn btn-sidebar">
                <i class="fas fa-search fa-fw"></i>
                </button>
            </div>
        </div>
    </div>
    <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <li class="nav-item">
                <a href="{{ route('admin.dashboard.index') }}" class="nav-link">
                    <i class="nav-icon fas fa-tachometer-alt"></i>
                    <p>
                        Màn quản lí chung
                    </p>
                </a>
            </li>
            <li class="nav-item {{ setNavBarActiveParent('admin/shops') }}">
                <a href="#" class="nav-link {{ setNavBarActiveChild('admin.shops') }}">
                    <i class="nav-icon fas fa-th"></i>
                    <p>
                        Shop tài khoản
                        <i class="right fas fa-angle-left"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="{{ route('admin.shops.index') }}" class="nav-link {{ setNavBarActiveChild('admin.shops.index') }}">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Màn quản lí</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('admin.shops.create') }}" class="nav-link {{ setNavBarActiveChild('admin.shops.create') }}">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Màn thêm mới</p>
                        </a>
                    </li>
                </ul>
            </li>
            <li class="nav-item {{ setNavBarActiveParent('admin/users') }}">
                <a href="#" class="nav-link {{ setNavBarActiveChild('admin.users') }}">
                    <i class="nav-icon fas fa-th"></i>
                    <p>
                        Quản lí User
                        <i class="right fas fa-angle-left"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="{{ route('admin.users.index') }}" class="nav-link {{ setNavBarActiveChild('admin.users.index') }}">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Màn quản lí</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('admin.users.post') }}" class="nav-link {{ setNavBarActiveChild('admin.users.post') }}">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Bài viết của user</p>
                        </a>
                    </li>
                </ul>
            </li>
            <li class="nav-item {{ setNavBarActiveParent('admin/posts') }}">
                <a href="#" class="nav-link {{ setNavBarActiveChild('admin.posts') }}">
                    <i class="nav-icon fas fa-th"></i>
                    <p>
                        Quản lí bài viết
                        <i class="right fas fa-angle-left"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="{{ route('admin.posts.index') }}" class="nav-link {{ setNavBarActiveChild('admin.posts.index') }}">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Màn quản lí</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('admin.posts.create') }}" class="nav-link {{ setNavBarActiveChild('admin.posts.create') }}">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Màn thêm mới</p>
                        </a>
                    </li>
                </ul>
            </li>
            <li class="nav-item">
                <a href="#" onclick="event.preventDefault();document.getElementById('logout-form').submit();" class="nav-link">
                    <i class="nav-icon fas fa-sign-out-alt"></i>
                    <p>
                        Đăng xuất
                        {{-- <span class="right badge badge-danger">New</span> --}}
                    </p>
                </a>
                <form id="logout-form" action="{{ route('admin.auth.logout.post') }}" method="POST" style="display: none;">
                    @csrf
                </form>
            </li>
        </ul>
    </nav>
</div>

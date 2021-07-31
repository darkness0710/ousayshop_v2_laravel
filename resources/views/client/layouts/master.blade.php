<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" name="viewport" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
        <!-- Favicons -->
        <link rel="apple-touch-icon" href="{{ asset('images/favicon.png') }}">
        <link rel="icon" href="{{ asset('images/favicon.png') }}">
        <title>
            OusayGaming
        </title>
        <!--     Fonts and icons     -->
        <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" />
        <link rel="stylesheet" href="{{ asset('css/client.css') }}">
        <script src="{{ asset('js/client.js') }}"></script>
    </head>
    <body class="landing-page bg-white">
        <nav id="sectionsNav" class="navbar bg-white fixed-top navbar-expand-lg ">
            <div class="container">
                @include('client.layouts.structures.logo')
                <button class="navbar-toggler" type="button" data-toggle="collapse" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                    <span class="navbar-toggler-icon"></span>
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse">
                <ul class="navbar-nav ml-auto">
                    <li class="dropdown nav-item">
                        <a href="#" class="dropdown-toggle nav-link" data-toggle="dropdown" aria-expanded="false">
                            <i class="material-icons">apps</i> Chức năng
                        <div class="ripple-container"></div></a>
                        <div class="dropdown-menu dropdown-with-icons">
                            <a href="{{ route('client.shops.index') }}" class="dropdown-item">
                                <i class="material-icons">layers</i> Shop Account 3Q
                            </a>
                            <a href="{{ route('client.games.index') }}" class="dropdown-item">
                                <i class="material-icons">content_paste</i> Hướng dẫn chơi game
                            </a>
                        </div>
                    </li>
                    <li class="dropdown nav-item">
                        <a href="#" class="dropdown-toggle nav-link" data-toggle="dropdown" aria-expanded="false">
                            <i class="material-icons">view_day</i> Dịch vụ
                        <div class="ripple-container"></div></a>
                        <div class="dropdown-menu dropdown-with-icons">
                            {{-- <a href="../sections.html#headers" class="dropdown-item">
                                <i class="material-icons">dns</i> Headers
                            </a>
                            <a href="../sections.html#features" class="dropdown-item">
                                <i class="material-icons">build</i> Features
                            </a>
                            <a href="../sections.html#blogs" class="dropdown-item">
                                <i class="material-icons">list</i> Blogs
                            </a>
                            <a href="../sections.html#teams" class="dropdown-item">
                                <i class="material-icons">people</i> Teams
                            </a>
                            <a href="../sections.html#projects" class="dropdown-item">
                                <i class="material-icons">assignment</i> Projects
                            </a> --}}
                            <a href="../sections.html#pricing" class="dropdown-item">
                                <i class="material-icons">monetization_on</i> Trung gian / Quảng cáo
                            </a>
                            {{-- <a href="../sections.html#testimonials" class="dropdown-item">
                                <i class="material-icons">chat</i> Testimonials
                            </a>
                            <a href="../sections.html#contactus" class="dropdown-item">
                                <i class="material-icons">call</i> Contacts
                            </a> --}}
                        </div>
                    </li>
                    @if (isUserLogin())
                        <li class="dropdown nav-item">
                            <a href="#pablo" class="profile-photo dropdown-toggle nav-link" data-toggle="dropdown" aria-expanded="false">
                                <div class="profile-photo-small">
                                    <img src="{{ getCurrentUser()->avatar_fb }}" alt="Circle Image" class="rounded-circle img-fluid">
                                </div>
                            <div class="ripple-container"></div></a>
                            <div class="dropdown-menu dropdown-menu-right">
                                <h6 class="dropdown-header">Chức năng người dùng</h6>
                                <a href="#pablo" class="dropdown-item">Thông tin cá nhân</a>
                                <a href="#pablo" class="dropdown-item">Các đơn tài khoản đã tạo</a>
                                <a href="#pablo" class="dropdown-item">Đăng bài viết</a>
                                <a href="#pablo" class="dropdown-item">Danh sách bài viết</a>
                                <a href="#pablo" onclick="event.preventDefault();document.getElementById('logout-form').submit();" class="dropdown-item">Đăng xuất</a>

                                <form id="logout-form" action="{{ route('client.social.facebook.logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>

                            </div>
                        </li>
                    @else
                        <li class="nav-item">
                            <a href="#" onclick="event.preventDefault();document.getElementById('login-form').submit();" class="btn btn-rose btn-raised btn-round " data-toggle="dropdown">
                                Đăng nhập bằng Facebook
                            </a>
                            <form id="login-form" action="{{ route('client.social.facebook.redirect') }}" method="GET" style="display: none;">
                                @csrf
                            </form>
                        </li>
                    @endif
                </ul>
                </div>
            </div>
        </nav>
        @yield('content')
    </body>
    @include('client.layouts.structures.footer')
</div>
</html>
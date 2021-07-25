<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" name="viewport" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
        <!-- Favicons -->
        <link rel="apple-touch-icon" href="../assets/img/apple-icon.png">
        <link rel="icon" href="../assets/img/favicon.png">
        <title>
            Landing &#45; Material Kit PRO by Creative Tim
        </title>
        <!--     Fonts and icons     -->
        <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" />
        <link rel="stylesheet" href="{{ asset('css/client.css') }}">
        <script src="{{ asset('js/client.js') }}"></script>
    </head>
    <body class="landing-page ">
        <nav id="sectionsNav" class="navbar bg-white fixed-top navbar-expand-lg ">
            <div class="container">
                <div class="navbar-translate">
                    <img src="https://ousayshop.github.io/img/logo.f4269b5e.png" style="width: 10%;">
                </div>
                <div class="collapse navbar-collapse">
                <ul class="navbar-nav ml-auto">
                    <li class="dropdown nav-item">
                        <a href="#" class="dropdown-toggle nav-link" data-toggle="dropdown" aria-expanded="false">
                            <i class="material-icons">apps</i> Components
                        <div class="ripple-container"></div></a>
                        <div class="dropdown-menu dropdown-with-icons">
                            <a href="../index.html" class="dropdown-item">
                                <i class="material-icons">layers</i> All Components
                            </a>
                            <a href="../docs/documentation.html" class="dropdown-item">
                                <i class="material-icons">content_paste</i> Documentation
                            </a>
                        </div>
                    </li>
                    <li class="dropdown nav-item">
                        <a href="#" class="dropdown-toggle nav-link" data-toggle="dropdown" aria-expanded="false">
                            <i class="material-icons">view_day</i> Sections
                        <div class="ripple-container"></div></a>
                        <div class="dropdown-menu dropdown-with-icons">
                            <a href="../sections.html#headers" class="dropdown-item">
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
                            </a>
                            <a href="../sections.html#pricing" class="dropdown-item">
                                <i class="material-icons">monetization_on</i> Pricing
                            </a>
                            <a href="../sections.html#testimonials" class="dropdown-item">
                                <i class="material-icons">chat</i> Testimonials
                            </a>
                            <a href="../sections.html#contactus" class="dropdown-item">
                                <i class="material-icons">call</i> Contacts
                            </a>
                        </div>
                    </li>
                </ul>
                </div>
            </div>
        </nav>
        <div class="page-header" data-parallax="true" style="background-image: url(&apos;../assets/img/bg8.jpg&apos;);">
            <div class="">
                <div class="row">
                    <div class="col-md-6">
                        <img src="https://ousayshop.github.io/img/03.a019dc5a.jpg" class="rounded">
                    </div>
                </div>
            </div>
        </div>
        @yield('content')
        <footer class="footer ">
            <div class="container">
                <nav class="pull-left">
                    <ul>
                        <li>
                            <a href="https://www.creative-tim.com">
                            Creative Tim
                            </a>
                        </li>
                        <li>
                            <a href="http://presentation.creative-tim.com">
                            About Us
                            </a>
                        </li>
                        <li>
                            <a href="http://blog.creative-tim.com">
                            Blog
                            </a>
                        </li>
                        <li>
                            <a href="https://www.creative-tim.com/license">
                            Licenses
                            </a>
                        </li>
                    </ul>
                </nav>
                <div class="copyright pull-right">
                    &copy;
                    <script>
                        document.write(new Date().getFullYear())
                    </script>, made with <i class="material-icons">favorite</i> by
                    <a href="https://www.creative-tim.com" target="_blank">Creative Tim</a> for a better web.
                </div>
            </div>
        </footer>
    </body>
</html>
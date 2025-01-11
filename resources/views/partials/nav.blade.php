<!-- Page Preloder -->
<div id="preloder">
    <div class="loader"></div>
</div>

<!-- Offcanvas Menu Section Begin -->
<div class="offcanvas-menu-overlay"></div>
<div class="offcanvas-menu-wrapper">
    <div class="canvas-close">
        <i class="fa fa-close"></i>
    </div>
    <div class="canvas-search search-switch">
        <i class="fa fa-search"></i>
    </div>
    <nav class="canvas-menu mobile-menu">
        <ul>
            <li><a href="/">Home</a></li>
            <li><a href="./services.html">Services</a></li>
            <li><a href="./team.html">Our Team</a></li>
            <li><a href="#">Pages</a>
                <ul class="dropdown">
                    <li><a href="./about-us.html">About us</a></li>
                    <li><a href="./class-timetable.html">Classes timetable</a></li>
                    <li><a href="./bmi-calculator.html">Bmi calculate</a></li>
                    <li><a href="./team.html">Our team</a></li>
                    <li><a href="./gallery.html">Gallery</a></li>
                    <li><a href="./blog.html">Our blog</a></li>
                    <li><a href="./404.html">404</a></li>
                </ul>
            </li>
            <li><a href="./contact.html">Contact</a></li>
        </ul>
    </nav>
    <div id="mobile-menu-wrap"></div>
    <div class="canvas-social">
        <a href="#"><i class="fa fa-facebook"></i></a>
        <a href="#"><i class="fa fa-twitter"></i></a>
        <a href="#"><i class="fa fa-youtube-play"></i></a>
        <a href="#"><i class="fa fa-instagram"></i></a>
    </div>
</div>
<!-- Offcanvas Menu Section End -->


<!-- Header Section Begin -->
<header class="header-section">
    <div class="container-fluid">
        <div class="row px-5">
            <div class="col-lg-3">
                <div class="logo">
                    <a href="/">
                        <img src="{{ asset('assets/img/logo.png') }}" alt="">
                    </a>
                </div>
            </div>
            <div class="col-lg-6">
                <nav class="nav-menu">
                    <ul>
                        @if(auth()->check() && auth()->user()->type == 'admin')
                            <li><a href="{{route('admin.home')}}">Dashboard</a></li>
                            <li><a href="{{route('admin.memberships.index')}}">Memberships</a></li>
                            
                            <li><a href="{{route('admin.accesslog.index')}}">Access Logs</a></li>
                            <li><a href="{{route('admin.reports.index')}}">Reports</a></li>
                            <li><a href="{{route('admin.inventories.index')}}">Inventories</a></li>
                        @else    
                            <li class="active"><a href="/">Home</a></li>
                            <li><a href="/#pricing-section">Services</a></li>
                            <li><a href="/memberships">Membership</a></li>
                        @endif
                    </ul>
                </nav>
            </div>
            <div class="col-lg-3">
                <div class="top-option">
                    <div class="to-social">
                        @guest
                            <a href="{{route('login')}}" class="primary-btn">Login</a>
                        @else
                            <a href="{{route('logout')}}" class="primary-btn"
                                onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();"
                            >Logout <i class="fa fa-sign-out"></i></a>
                            {{-- <a href="" class="primary-btn">Login</a> --}}
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                            </form>
                        @endguest
                      
                    </div>
                </div>
            </div>
        </div>
        <div class="canvas-open">
            <i class="fa fa-bars"></i>
        </div>
    </div>
</header>
<!-- Header End -->
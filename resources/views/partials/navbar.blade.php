<!-- Header Area Start -->
<header class="top">
    <div class="header-top">
        <div class="container">
            <div class="row">
                <div class="col-md-8 col-sm-8 col-xs-12">
                </div>
                <div class="col-md-4 col-sm-4 col-xs-12">
                    <div class="header-top-right text-right">
                        <div class="main-menu">
                            <ul>
                                @if(!Auth::check())
                                    <li><a href="{{ url('/login') }}">login</a></li>
                                    <li><a href=" {{ route('identification') }} ">signup</a>
                                        <ul>
                                                <li><a href="{{ route('identification') }}">Students</a></li>
                                                <li><a href=" {{ route('identificationP') }} ">Professors</a></li>
                                        </ul>
                                    </li>
                                @endif
                                @if(Auth::check())
                                    <li>
                                            <a class="dropdown-item" href="{{ route('logout') }}"
                                                                onclick="event.preventDefault();
                                                                                document.getElementById('logout-form').submit();">
                                                                    {{ __('Logout') }}
                                            </a>

                                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                                @csrf
                                            </form>
                                    </li>
                                @endif
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @if(Auth::check())
    <div class="header-area two header-sticky">
        <div class="container">
            <div class="row">
                <div class="col-md-3 col-sm-3 col-xs-6">
                    <div class="logo">
                        <a href="index.html"><img src="{{ asset('img/logo/logo2.png') }}" alt="eduhome" /></a>
                    </div>
                </div>
                <div class="col-md-9 col-sm-9 col-xs-6">
                    <div class="content-wrapper text-right">
                        <!-- Main Menu Start -->
                        <div class="main-menu">
                            <nav>
                                <ul>
                                    <li><a href="index.html">Home</a>
                                        <ul>
                                            <li><a href="index.html">Home One</a></li>
                                            <li><a href="index-2.html">Home Two</a></li>
                                            <li><a href="index-3.html">Home Three</a></li>
                                            <li><a href="index-4.html">Home Four</a></li>
                                            <li><a href="index-5.html">Home Five</a></li>
                                        </ul>
                                    </li>
                                    <li><a href="about.html">About</a></li>
                                    <li><a href="course.html">courses</a>
                                        <ul>
                                            <li><a href="course.html">courses</a></li>
                                            <li><a href="course-details.html">courses details</a></li>
                                        </ul>
                                    </li>
                                    <li><a href="event.html">event</a>
                                        <ul>
                                            <li><a href="event.html">event</a></li>
                                            <li><a href="event-left-side-bar.html">event left sidebar</a></li>
                                            <li><a href="event-right-side-bar.html">event right sidebar</a></li>
                                            <li><a href="event-details.html">event details</a></li>
                                        </ul>
                                    </li>
                                    <li class="hidden-sm"><a href="teacher.html">teacher</a>
                                        <ul>
                                            <li><a href="teacher.html">teacher</a></li>
                                            <li><a href="teacher-details.html">teacher details</a></li>
                                        </ul>
                                    </li>
                                    <li><a href="blog.html">blog</a>
                                        <ul>
                                            <li><a href="blog.html">blog</a></li>
                                            <li><a href="blog-left-side-bar.html">blog left sidebar</a></li>
                                            <li><a href="blog-right-side-bar.html">blog righ sidebar</a></li>
                                            <li><a href="blog-details.html">blog details</a></li>
                                        </ul>
                                    </li>
                                    <li><a href="contact.html">Contact</a></li>
                                    <li><a href="#">Buy Now</a>
                                </ul>
                            </nav>
                        </div>
                        <!-- Main Menu End -->
                        
                    </div>
                </div>
                <div class="col-xs-12">
                    <div class="mobile-menu hidden-lg hidden-md hidden-sm"></div> 
                </div>
            </div>
        </div>
    </div>
@endif
</header>
<!-- Header Area End -->
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
                                <li> <a href="{{ route('admin.addStudy') }}" >Add Studyarea / Module</a> </li>    
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
    @if(Auth::check() && Auth::user()->is_admin )
    <div class="header-area two header-sticky">
        <div class="container">
            <div class="row">
                <div class="col-md-3 col-sm-3 col-xs-6">
                    <div class="logo">
                        <a href="{{route('admin.home')}}"><img src="{{ asset('img/logo/logo2.png') }}" alt="eduhome" /></a>
                    </div>
                </div>
                <div class="col-md-9 col-sm-9 col-xs-6">
                    <div class="content-wrapper text-right">
                        <!-- Main Menu Start -->
                        <div class="main-menu">
                            <nav>
                                <ul>
                                    <li><a href="{{route('admin.home')}}">Home</a></li>
                                    <li><a href="">Studyareas</a>
                                        <ul>
                                            @foreach($studyareas as $studyarea)
                                                <li><a href="{{ route('studyarea',$studyarea->id) }}"> {{ $studyarea->title }}</a></li>
                                            @endforeach
                                        </ul>
                                    </li>
                                    
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
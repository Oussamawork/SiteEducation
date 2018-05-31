@extends ('layouts.master')

@section ('title')
    Page 1
@endsection

@section ('content')
            <!-- Courses Area Start -->
            <div class="courses-area pt-150 text-center">
                <div class="container">
                    <div class="row">
                        <div class="col-xs-12">
                            <div class="section-title">
                                <img src=" {{ asset('img/icon/section.png') }} " alt="section-title">
                                <h2>VOS COURSES</h2>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        @foreach($posts as $post)
                            <div class="col-md-4 col-sm-6 col-xs-12">
                                <div class="single-course">
                                    <div class="course-content">
                                    <h3><a href="course-details.html"> {{ $post->title }} </a></h3>
                                        <p> {{ $post->description }} </p>
                                        <a class="default-btn" href="course-details.html">read more</a>
                                    </div>   
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
            <!-- Courses Area End -->
@endsection
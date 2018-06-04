@extends ('layouts.master') @section ('title') Page 1 @endsection @section ('content')
<!-- Blog Start -->
<div class="courses-details-area blog-area pt-150 pb-140">
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <div class="courses-details">
                    <div class="course-details-content">
                        <h2>{{ $post->title }}</h2>
                    <p>{{ $post->description }}</p>
                    </div>
                    <div class="courses-details-img">
                            <img src="{{ asset('img/course/courses-details.jpg') }}" alt="courses-details">
                    </div>
                    <a  class="default-btn" href="{{ asset('storage/docs/1527878425docs.pdf') }}"> Download The Pdf </a>
                <a class="default-btn" href="{{ route('display',$post->id) }}"> View The PDF File </a>
                </div>
            </div>
            <div class="col-md-4">
                <div class="blog-sidebar right">
                    <div class="single-blog-widget mb-50">
                            <h3>Other documents</h3>
                        @foreach($posts as $post)
                            <div class="single-post mb-50">
                                <div class="single-post-img">
                                    <a href="blog-details.html"><img src="{{asset('img/post/post1.jpg')}}" alt="post">
                                        <div class="blog-hover">
                                            <i class="fa fa-link"></i>
                                        </div>
                                    </a>
                                </div>
                                <div class="single-post-content">
                                    <h4><a href="blog-details.html">{{ $post->title }}</a></h4>
                                    <p>By {{$user->first_name}} {{$user->last_name}} / <br>{{$post->updated_at}}</p>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>   
                     
        </div>
    </div>
</div>
<!-- Blog End -->


@endsection

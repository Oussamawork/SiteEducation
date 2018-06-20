@extends ('layouts.master') 

@section ('title') Page 1 @endsection 

@section ('content')
<!-- Courses Area Start -->
<div class="courses-area pt-15 text-center">
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
        <div class="col-md-14 mb-25">
            <a class="btn btn-primary btn-sm" href="{{ route('admin.home') }}" role="button"><span class="glyphicon glyphicon-circle-arrow-left"></span>Back</a>
        </div>
        </div>
        <div class="row">
            @foreach($posts as $post) 
                @if( $post->type_id === 1)
                    <div class="col-md-4 col-sm-6 col-xs-12">
                        <div class="single-course mb-25">
                            <div class="course-content mb-3">
                                <h3 class="text-center text-primary">
                                    <a href=" Document-details/{{ $post->id }} "> {{ $post->title }} </a>
                                </h3>
                                <h3>
                                    <p class="text-primary"> {{ $post->description }} </p>
                                </h3>
                                <p>By {{$user->first_name}} {{$user->last_name}} / {{$post->updated_at}}</p>

                                <a class="default-btn btn-primary btn-lg" href=" {{ route('display',$post->id) }} ">See it</a>
                                <a class="default-btn btn-success btn-lg" href=" {{ route('download',$post->id) }} ">Download</a>

                                <a class="default-btn btn-warning btn-lg" href="{{ route('update',$post->id) }}">Modify </a>
                                <a class="default-btn btn-danger btn-lg" href=" {{ route('delete',$post->id) }} ">Delete</a>
                            </div>
                        </div>
                    </div>
                @endif
                @if( $post->type_id === 2)
                    <div class="col-md-4 col-sm-6 col-xs-12">
                        <div class="single-course mb-25">
                            <div class="course-content mb-3">
                                <h3 class="text-center text-success">
                                    <a href=" Document-details/{{ $post->id }} "> {{ $post->title }} </a>
                                </h3>
                                <h3>
                                    <p class="text-success"> {{ $post->description }} </p>
                                </h3>
                                <p>By {{$user->first_name}} {{$user->last_name}} / {{$post->updated_at}}</p>

                                <a class="default-btn btn-primary btn-lg" href=" {{ route('display',$post->id) }} ">See it</a>
                                <a class="default-btn btn-success btn-lg" href=" {{ route('download',$post->id) }} ">Download</a>

                                <a class="default-btn btn-warning btn-lg" href=" {{ route('update',$post->id) }} ">Modify </a>
                                <a class="default-btn btn-danger btn-lg" href=" {{ route('delete',$post->id) }} ">Delete</a>
                            </div>
                        </div>
                    </div>
                @endif
                @if( $post->type_id === 3)
                    <div class="col-md-4 col-sm-6 col-xs-12">
                        <div class="single-course mb-25">
                            <div class="course-content mb-3">
                                <h3 class="text-center text-danger">
                                    <a href=" Document-details/{{ $post->id }} "> {{ $post->title }} </a>
                                </h3>
                                <h3>
                                    <p class="text-danger"> {{ $post->description }} </p>
                                </h3>
                                <p>By {{$user->first_name}} {{$user->last_name}} / {{$post->updated_at}}</p>

                                <a class="default-btn btn-primary btn-lg" href=" {{ route('display',$post->id) }} ">See it</a>
                                <a class="default-btn btn-success btn-lg" href=" {{ route('download',$post->id) }} ">Download</a>

                                <a class="default-btn btn-warning btn-lg" href="{{ route('update',$post->id) }}">Modify </a>
                                <a class="default-btn btn-danger btn-lg" href=" {{ route('delete',$post->id) }} ">Delete</a>
                            </div>
                        </div>
                    </div>
                @endif
            @endforeach
        </div>
        <div class="row">
            <div class="col-md-12 text-center">
                {{ $posts->links() }}
            </div>
        </div>
    </div>
</div>
<a id="scrollUp" href="#top" style="position: fixed; z-index: 2147483647; display: block;"><i class="fa fa-angle-up"></i></a>
<!-- Courses Area End -->
@endsection

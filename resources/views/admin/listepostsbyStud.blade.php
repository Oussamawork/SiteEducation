@extends ('layouts.master') 

@section ('title') 

Page 1 

@endsection 

@section ('content')
<!-- Course Start -->
<div class="course-area pt-150 pb-150">
    <div class="container">
            <div class="row">
                    <div class="col-md-12">
                        <div class="section-title text-center">
                            <img src="{{asset('img/icon/section.png')}}" alt="section-title">
                            <h1>{{$studyarea->title}}</h1>
                        </div>
                    </div>
                </div>
    @foreach($studyarea->modules as $module)
        <div class="row">
            <div class="col-xs-12">
                <div class="course-title">
                    <h3>{{ $module->title }}</h3> 
                </div>
            </div>
        </div>   
         
            <div class="row">
                @foreach($module->posts as $post) 
                    <div class="col-md-4 col-sm-6 col-xs-12">
                            <div class="single-course mb-25">
                                <div class="course-content mb-3">
                                    <h3 class="text-center text-primary">
                                        <a href=" Document-details/{{ $post->id }} "> {{ $post->title }} </a>
                                    </h3>
                                    <h3>
                                        <p class="text-primary"> {{ $post->description }} </p>
                                    </h3>

                                        <p>{{-- By {{$user->first_name}} {{$user->last_name}} / --}} {{$post->updated_at}}</p>
    
                                    <a class="default-btn btn-primary btn-lg" href=" {{ route('display',$post->id) }} ">See it</a>
                                    <a class="default-btn btn-danger btn-lg" href=" {{ route('download',$post->id) }} ">Download</a>

                                </div>
                            </div>
                        </div>
                @endforeach
            </div>
        
    @endforeach
</div> 
</div>       
<!-- Course End -->
@endsection
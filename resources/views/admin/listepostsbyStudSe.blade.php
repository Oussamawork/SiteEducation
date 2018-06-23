@extends ('layouts.master') 

@section ('title') 

Page 1 

@endsection 

@section ('content')
<!-- Course Start -->
<div class="course-area pt-6 pb-150">
    <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="section-title text-center">
                        <img src="{{asset('img/icon/section.png')}}" alt="section-title">
                        <h1>{{$studyarea->title}}</h1>
                    </div>
                </div>
            </div>
            <div class="row">
                    <div class="col-md-10 col-md-offset-1" style="margin-left: 13.333333%;">
                            <div class="blog-sidebar left">
                                <div class="single-blog-widget mb-50">
                                    <h3>search</h3>
                                    <div class="blog-search">
                                        <form id="search" action="{{ route('admin.searchS') }}" method="get">
                                            <input type="search" placeholder="Search..." name="search" />
                                            <button type="submit">
                                                <span><i class="fa fa-search"></i></span>
                                            </button>
                                        <input value="{{ $studyarea->id }}" name="studyarea" hidden>
                                        </form>
                                    </div>
                                </div>     
                            </div>
                    </div>   
            </div>
        <div class="row">
            <div class="col-md-8">
                <div class="course-title">
                    <h3>  </h3> 
                </div>
            </div>
        </div>

        <div class="row">
                <div class="col-md-4 col-sm-6 col-xs-12">
                        <div class="single-course mb-25">
                            <div class="course-content mb-3">
                                <h3 class="text-center text-primary">
                                    <a href="#"> {{-- {{ $post->title }} --}} </a>
                                </h3>
                                <h3>
                                    <p class="text-primary"> {{ $post->description }} </p>
                                </h3>
                                @php 
                                    $id = $post->professor->id ;
                                    $user=$users->where('id',$id)->first();
                                @endphp
                                <p>By {{ $user->first_name }} {{$user->last_name}} / {{$post->updated_at->diffForHumans()}}</p>
                                <a class="default-btn btn-primary btn-lg" href=" {{ route('display',$post->id) }} ">See it</a>
                                <a class="default-btn btn-danger btn-lg" href=" {{ route('download',$post->id) }} ">Download</a>

                            </div>
                        </div>
                    </div>
            

        </div>
        
</div> 
</div>       
<!-- Course End -->
@endsection
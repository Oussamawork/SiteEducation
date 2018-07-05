@extends ('layouts.master') 

@section ('title') 

Filière

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
                                <div class="course-title">
                                    <h3 style="color: #fff">Chercher une course</h3>
                                </div>
                                <div class="blog-search">
                                    <form id="search" action="{{ route('admin.searchS') }}" method="get">
                                        <input type="search" placeholder="Chercher..." name="search" />
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
        @foreach($studyarea->modules as $module)
            <div class="row pb-10">
                <div class="col-md-8">
                    <div class="course-title">
                        <h3>{{ $module->title }}</h3> 
                    </div>
                </div>
            </div>
            <div class="row">
                @foreach($module->posts as $post)    
                    <div class="col-md-4 col-sm-6 col-xs-12">
                            <div class="single-course mb-25">
                                @if( $post->type_id === 1)
                                    <div class="event-date" style="position: absolute;left: 27px;top: -11px;width: 83px;height: 40px;background: rgba(0, 102, 255, 0.62);">
                                        <h3 style="color: #fefefe;font-size: 20px;line-height: 2px;padding: 0px 15px 11px;text-align: center;">Cours </h3>
                                    </div>
                                @endif  
                                @if( $post->type_id === 2)
                                    <div class="event-date" style="position: absolute;left: 27px;top: -11px;width: 83px;height: 40px;background: rgba(15, 136, 13, 0.62);">
                                        <h3 style="color: #fefefe;font-size: 20px;line-height: 2px;padding: 0px 15px 11px;text-align: center;">TD </h3>
                                    </div>
                                @endif  
                                @if( $post->type_id === 3)
                                    <div class="event-date" style="position: absolute;left: 27px;top: -11px;width: 83px;height: 40px;background: rgba(181, 15, 15, 0.62);">
                                        <h3 style="color: #fefefe;font-size: 20px;line-height: 2px;padding: 0px 15px 11px;text-align: center;">Note </h3>
                                    </div>
                                @endif  
                                
                                <div class="course-content mb-3">
                                    <h3 class="text-center text-primary">
                                        <a href="#"> {{ $post->title }} </a>
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
                @endforeach
            </div>
        @endforeach
    </div> 
</div>       
<!-- Course End -->
@endsection
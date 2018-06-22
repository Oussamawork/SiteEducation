@extends ('layouts.master') @section ('title') Page 1 @endsection @section ('content')
<div class="row">
        <div class="col-md-12 pt-50 pb-20">
            <div class="section-title text-center">
                <img src="{{asset('img/icon/section.png')}}" alt="section-title">
                @foreach($studyarea as $studyarea => $value)
                    <h1>{{$studyarea}}</h1>
                @endforeach
            </div>
        </div>
</div>

    <div class="row pt-10">
            <nav class="navbar navbar-light bg-light">       
                <ul class="nav nav-tabs" role="tablist" style="padding-left: 35px;">
                    @foreach($modules as $module)
                        <li role="presentation" class="{{$module->id == 1 ? 'active' : ''}}">
                            <a href="#{{$module->id}}" aria-controls="1" role="tab" data-toggle="tab">{{$module->title}}</a>
                        </li>
                    @endforeach
                </ul>
            </nav>
</div>

<div class="row">
    <div class="tab-content">
        @foreach($modules as $module)
                <div role="tabpanel" class="tab-pane {{$module->id == 1 ? 'active' : ''}}" id="{{$module->id}}">
                    @foreach($posts as $post) 
                        @if($module->id == $post->module_id)
                            <div class="col-md-4 col-sm-6 col-xs-12"  style="width: 40rem; margin-left: 50px;">
                                    <div class="single-course mb-25">
                                        <div class="course-content mb-3" style="min-height: 327px;">
                                            <h3 class="text-center text-danger">
                                                <a href="#">{{ $post->title }}</a>
                                            </h3>
                                            <div class="row pt-30">
                                                <h3>
                                                    <p class="text-danger"> {{ $post->description }}  </p>
                                                </h3>
                                                @php 
                                                    $id = $post->professor->id ;
                                                    $user=$users->where('id',$id)->first();
                                                @endphp
                                                <p>By {{$user->first_name}} {{$user->last_name}} / {{$post->updated_at->diffForHumans()}}</p>
                                                <div class="row pt-20  pb-1" style="margin-left: -3px;">
                                                    <a class="default-btn btn-primary btn-lg" href=" {{ route('display',$post->id) }} ">See it</a>
                                                    <a class="default-btn btn-danger btn-lg" href=" {{ route('download',$post->id) }} ">Download</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                            </div>
                        @endif
                    @endforeach
                </div>
        @endforeach
    </div>
</div>

<div class="row">
    <div class="col-md-12 text-center">
        {{-- {{$posts->links()}}         --}}                   
    </div>
</div>
@endsection
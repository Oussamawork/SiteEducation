@extends ('layouts.master') @section ('title') Page 1 @endsection @section ('content')
<div class="course-area">
    <div class="container">
        <div class="row pb-55">
            <div class="row">
                <div class="col-md-12">
                    <div class="section-title text-center">
                        <img src="{{asset('img/icon/section.png')}}" alt="section-title">
                        <h1>{{$studyarea->title}}</h1>
                    </div>
                </div>
            </div>
            <div class="row pt-30">
                @foreach($studyarea->modules as $module)
                <div class="col-md-4 col-sm-6 col-xs-12">
                    <div class="single-course mb-25 mb-3">
                        <div class="course-content" style="background: #2C2B5E; border-radius: 42px;">
                            <h3 class="text-center">
                                <a href="{{ route('user.index', $module->id) }}" style="color: #fff; ">{{ $module->title }}</a>
                            </h3>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
@endsection

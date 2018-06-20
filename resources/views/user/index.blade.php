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
    <div>
            
            <ul class="nav nav-tabs" role="tablist">
                @foreach($modules as $module => $value)
                    <li role="presentation" class="{{$value == 1 ? 'active' : ''}}"><a href="#{{$value}}" aria-controls="1" role="tab" data-toggle="tab">{{$module}}</a></li>
                @endforeach
            </ul>
            
            <!-- Tab panes -->
            <div class="tab-content">
              <div role="tabpanel" class="tab-pane active" id="1">
                    <div class="col-md-4 col-sm-6 col-xs-12">
                            <div class="single-course mb-25">
                                <div class="course-content mb-3">
                                    <h3 class="text-center text-danger">
                                        <a href="#">  </a>
                                    </h3>
                                    <h3>
                                        <p class="text-danger">  </p>
                                    </h3>
                                    <p>By {{-- {{$user->first_name}} {{$user->last_name}} / {{$post->updated_at}} --}}</p>
                                    <a class="default-btn btn-primary btn-lg" href=" {{-- {{ route('display',$post->id) }}  --}}">See it</a>
                                    <a class="default-btn btn-success btn-lg" href=" {{-- {{ route('download',$post->id) }} --}} ">Download</a>
                                </div>
                            </div>
                    </div>
              </div>
              <div role="tabpanel" class="tab-pane" id="2">2</div>
              <div role="tabpanel" class="tab-pane" id="3">3</div>
              <div role="tabpanel" class="tab-pane" id="4">4</div>
            </div>
          
          </div>
@endsection
@extends ('layouts.master') @section ('title') Ajout Filière @endsection @section ('content')
<!-- Contact Start -->
<div class="course-area pt-20 pb-20">
<div class="container">
    <div class="row centered-form">
        <div class="col-xs-12 col-sm-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">Ajouter Filière</h3>
                </div>
                @if(Session::has('info'))
                    <div class="row text-center">
                            <div class="col-md-6 col-md-offset-3">
                                <p class="alert alert-success">{{ Session::get('info') }}</p>
                            </div>
                    </div>
                @endif
                <div class="panel-body">
                <form action="{{ route('admin.addStudy') }}" method="post">
                        {{ csrf_field() }}
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <input type="text" class="form-control" placeholder="Title" name="title" value="{{ Session('title') ? Session('title') : old('title') }}" required/> 
                                    @if ($errors->has('title'))
                                        <h5>{{ $errors->first('title') }}</h5>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <button type="submit" class="btn btn-danger btn-sm">
                                    <span class="glyphicon glyphicon-floppy-disk"></span>Ajouter
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="row centered-form">
        <div class="col-xs-12 col-sm-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">Ajouter Module</h3>
                </div>
                @if(Session::has('infoM'))
                <div class="row text-center">
                        <div class="col-md-6 col-md-offset-3">
                            <p class="alert alert-success">{{ Session::get('infoM') }}</p>
                        </div>
                </div>
                @endif
                <div class="panel-body">
                <form action="{{ route('admin.addModule') }}" method="post">
                        @csrf
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <input type="text" class="form-control" placeholder="Title" name="title" value="{{ Session('title') ? Session('title') : old('title') }}"/> 
                                    @if ($errors->has('title'))
                                        <h5>{{ $errors->first('title') }}</h5>
                                    @endif
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="category">Filière</label>
                                    <select class="form-control" name="studyarea">
                                        @foreach($studyareas as $studyarea)
                                    <option value="{{ $studyarea->id }}"> {{$studyarea->title }} </option>
                                        @endforeach
                                    </select>
                                    @if ($errors->has('studyarea'))
                                            <span class="invalid-feedback"></span>
                                            <h5>{{ $errors->first('studyarea') }}</h5>
                                    @endif
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <button type="submit" class="btn btn-danger btn-sm">
                                    <span class="glyphicon glyphicon-floppy-disk"></span>Ajouter
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
@endsection

@extends ('layouts.master') 

@section ('title') 

Ajout Document

@endsection 

@section('content')
<form enctype="multipart/form-data" method="post" action="{{ route('admin.ajoutdocument') }}">
    {{ csrf_field() }}
    <div class="container pb-50">            
        <div class="row">
            <div class="col-md-12">
                <div class="panel-group" id="accordion">
                    <div class="panel panel-danger">
                        <div class="panel-heading">
                            <h4 class="panel-title text-center">
                                <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne">
                                    <span class="glyphicon glyphicon-file">
                                    </span>POST NEW DOCUMENT</a>
                            </h4>
                        </div>
                        @if(Session::has('info'))
                            <div class="row text-center">
                                    <div class="col-md-12">
                                        <p class="alert alert-success">{{ Session::get('info') }}</p>
                                    </div>
                            </div>
                        @endif
                        <div id="collapseOne" class="panel-collapse collapse in">
                            <div class="panel-body">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <input type="text" class="form-control" placeholder="Title" name="title" value="{{ Session('title') ? Session('title') : old('title') }}"/>
                                            @if ($errors->has('title'))
                                                    <h5>{{ $errors->first('title') }}</h5>
                                             @endif
                                        </div>
                                        <div class="form-group">
                                            <textarea class="form-control" placeholder="Description" rows="3" name="description" value="{{ Session('description') ? Session('description') : old('description') }}"></textarea>
                                            @if ($errors->has('description'))
                                                    <h5>{{ $errors->first('description') }}</h5>
                                             @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="category">Studyarea</label>
                                            <select class="form-control" name="studyarea" {{ $errors->has('studyarea') ? ' is-invalid ' : ''}}>
                                                    <option value="">--Select Studyarea--</option>
                                                    @foreach($studyareas as $studyarea => $value)
                                                        <option value="{{ $studyarea }}">{{ $value }}</option>
                                                    @endforeach
                                            </select>
                                            @if ($errors->has('studyarea'))
                                                <span class="invalid-feedback"></span>
                                                    <h5>{{ $errors->first('studyarea') }}</h5>
                                                
                                             @endif
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="category">Module</label>
                                            <select class="form-control" name="module">
                                                <option>--Select The Studyarea First--</option>
                                            </select>
                                            @if ($errors->has('module'))
                                                <span class="invalid-feedback">
                                                    <h5>{{ $errors->first('module') }}</h5>
                                                </span>
                                             @endif
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="category">Type</label>
                                            <select class="form-control" name="type">
                                                @foreach($types as $type)
                                                    <option value="{{ $type->id }}">{{ $type->title }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="well well-sm well-primary">
                                            <div class="input-group image-preview">
                                                <input type="text" class="form-control image-preview-filename" disabled="disabled">
                                                <span class="input-group-btn">
                                                    <div class="btn btn-default image-preview-input">
                                                        <span class="glyphicon glyphicon-folder-open"></span>
                                                        <span class="image-preview-input-title">Browse (Pdf File)</span>
                                                        <input type="file" accept=".pdf" name="file">
                                                    </div>
                                                </span>
                                            </div>
                                            @if ($errors->has('file'))
                                                <span class="invalid-feedback">
                                                    <h5>{{ $errors->first('file') }}</h5>
                                                </span>
                                             @endif
                                        </div>
                                    </div>
                                </div>
                                

                                <div class="row">
                                    <div class="col-md-12">
                                    <a class="btn btn-primary btn-sm" href="{{ route('admin.home') }}" role="button"><span class="glyphicon glyphicon-circle-arrow-left"></span>Back</a>
                                        <button type="submit" class="btn btn-danger btn-sm">
                                            <span class="glyphicon glyphicon-floppy-disk"></span>Publish
                                        </button>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>

{{-- AJAX --}}
<script src="{{ asset('js/app.js') }}"></script>
<script src="{{ asset('js/customU.js') }}"></script>

@endsection

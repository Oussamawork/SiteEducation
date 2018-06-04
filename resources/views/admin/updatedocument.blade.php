@extends ('layouts.master') 

@section ('title') 

Add Document

@endsection 

@section('content')
<form enctype="multipart/form-data" method="post" action="{{ route('admin.update') }}">
    {{ csrf_field() }}
    <div class="container">            
        <div class="row">
            <div class="col-md-12">
                <div class="panel-group" id="accordion">
                    <div class="panel panel-danger">
                        <div class="panel-heading">
                            <h4 class="panel-title text-center">
                                <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne">
                                    <span class="glyphicon glyphicon-file">
                                    </span>Post modification</a>
                            </h4>
                        </div>
                        @if(Session::has('info'))
                            <div class="row text-center">
                                    <div class="col-md-12">
                                        <p class="alert alert-success">{{ Session::get('info') }}</p>
                                    </div>
                            </div>
                        @endif
                        <input value="{{ $post->id }}" name="id" hidden>
                        <div id="collapseOne" class="panel-collapse collapse in">
                            <div class="panel-body">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <input type="text" class="form-control" placeholder="Title" name="title" value="{{ Session('title') ? Session('title') : $post->title }}"/>
                                            @if ($errors->has('title'))
                                                <span class="invalid-feedback">
                                                    <h5>{{ $errors->first('title') }}</h5>
                                                </span>
                                             @endif
                                        </div>
                                        <div class="form-group">
                                            <textarea class="form-control" placeholder="Description" rows="3" name="description"></textarea>
                                            @if ($errors->has('description'))
                                                <span class="invalid-feedback">
                                                    <h5>{{ $errors->first('description') }}</h5>
                                                </span>
                                             @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
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
                                    <a class="btn btn-primary btn-sm" href="{{ route('admin.listedocuments') }}" role="button"><span class="glyphicon glyphicon-circle-arrow-left"></span>Back</a>
                                        <button type="submit" class="btn btn-danger btn-sm">
                                            <span class="glyphicon glyphicon-floppy-disk"></span>Update
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

@endsection

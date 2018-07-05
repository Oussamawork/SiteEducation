@extends ('layouts.master')

@section ('title')
    Register
@endsection

@section('content')

<div class="container-fluid">
    <section class="container pt-50 pb-50">
            <form method="POST" action="{{ route('edit') }}">
                @csrf
            <div class="container-page">
                <div class="col-md-2"></div>				
                <div class="col-md-8">
                    <h3 class="dark-grey text-center">Registration</h3>
                    
                    <div class="form-group col-lg-12">
                        <label>First name</label>
                        <input id="firstname" type="text" class="form-control{{ $errors->has('firstname') ? ' is-invalid' : '' }}" name="firstname" value="{{ old('firstname') }}" required autofocus>
                        
                        @if ($errors->has('firstname'))
                            <span class="invalid-feedback">
                                <strong>{{ $errors->first('firstname') }}</strong>
                            </span>
                        @endif
                    </div>
                    
                    <div class="form-group col-lg-12">
                            <label>Last name</label>
                            <input id="lastname" type="text" class="form-control{{ $errors->has('lastname') ? ' is-invalid' : '' }}" name="lastname" value="{{ old('lastname') }}" required autofocus>
                            @if ($errors->has('lastname'))
                                <span class="invalid-feedback">
                                    <strong>{{ $errors->first('lastname') }}</strong>
                                </span>
                            @endif
                    </div>

                    <div class="form-group col-lg-6 pb-10">
                        <label>E-mail Address</label>
                        <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required>
                        @if ($errors->has('email'))
                            <span class="invalid-feedback">
                                <strong>{{ $errors->first('email') }}</strong>
                            </span>
                        @endif
                    </div>
                
                    @if( !isset($is_admin) )
                        <div class="form-group col-lg-6 pb-10">
                            <label>Studyarea</label>
                            <select class="form-control" name="studyarea">
                                    @foreach($studyareas as $studyarea)
                                        <option value= {{$studyarea->id}} > {{$studyarea->title}} </option>
                                    @endforeach
                            </select>
                            @if ($errors->has('studyarea'))
                                <span class="invalid-feedback">
                                    <strong>{{ $errors->first('studyarea') }}</strong>
                                </span>
                            @endif
                        </div>
                    @endif
                                
                    <div class="form-group col-lg-6">
                        <label>Password</label>
                        <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>
                        @if ($errors->has('password'))
                            <span class="invalid-feedback">
                                <strong>{{ $errors->first('password') }}</strong>
                            </span>
                        @endif
                    </div>
                    
                    <div class="form-group col-lg-6">
                        <label>Confirm Password</label>
                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                    </div>	
                
                    {{-- Sending identification --}}
                    <input id="identification" type="text" name="identification" value={{ $identification }} hidden>

                    {{-- is_admin or not --}}
                    <input id="is_admin" type="text" name="is_admin" value="{{ $is_admin ?? null }}" hidden>
                    <div class="form-group col-lg-6">
                        <button type="submit" class="btn btn-primary">Register</button>
                    </div>
                </div>
            </div>
            </form>
    </section>
</div>


@endsection
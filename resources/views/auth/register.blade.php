@extends ('layouts.master')

@section ('title')
    Register
@endsection

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('edit') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="firstname" class="col-md-4 col-form-label text-md-right">{{ __('First name') }}</label>

                            <div class="col-md-6">
                                <input id="firstname" type="text" class="form-control{{ $errors->has('firstname') ? ' is-invalid' : '' }}" name="firstname" value="{{ old('firstname') }}" required autofocus>

                                @if ($errors->has('firstname'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('firstname') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                                <label for="lastname" class="col-md-4 col-form-label text-md-right">{{ __('Last name') }}</label>
    
                                <div class="col-md-6">
                                    <input id="lastname" type="text" class="form-control{{ $errors->has('lastname') ? ' is-invalid' : '' }}" name="lastname" value="{{ old('lastname') }}" required autofocus>
    
                                    @if ($errors->has('lastname'))
                                        <span class="invalid-feedback">
                                            <strong>{{ $errors->first('lastname') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required>

                                @if ($errors->has('email'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        @if( !isset($is_admin) )
                            <div class="form-group row">
                                <label for="studyarea" class="col-md-4 col-form-label text-md-right">{{ __('studyarea') }}</label>
                                <div class="col-md-6">
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
                            </div>
                        @endif

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                            </div>
                        </div>

                        {{-- Sending identification --}}
                        <input id="identification" type="text" name="identification" value={{ $identification }} >

                        {{-- is_admin or not --}}
                        <input id="is_admin" type="text" name="is_admin" value={{ $is_admin ?? null }} >

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

{{-- <div class="container-fluid">
        <section class="container">
            <div class="container-page">				
                <div class="col-md-6">
                    <h3 class="dark-grey">Registration</h3>
                    
                    <div class="form-group col-lg-12">
                        <label>Username</label>
                        <input type="" name="" class="form-control" id="" value="">
                    </div>
                    
                    <div class="form-group col-lg-6">
                        <label>Password</label>
                        <input type="password" name="" class="form-control" id="" value="">
                    </div>
                    
                    <div class="form-group col-lg-6">
                        <label>Repeat Password</label>
                        <input type="password" name="" class="form-control" id="" value="">
                    </div>
                                    
                    <div class="form-group col-lg-6">
                        <label>Email Address</label>
                        <input type="" name="" class="form-control" id="" value="">
                    </div>
                    
                    <div class="form-group col-lg-6">
                        <label>Repeat Email Address</label>
                        <input type="" name="" class="form-control" id="" value="">
                    </div>			
                    
                    <div class="col-sm-6">
                        <input type="checkbox" class="checkbox" />Sigh up for our newsletter
                    </div>
    
                    <div class="col-sm-6">
                        <input type="checkbox" class="checkbox" />Send notifications to this email
                    </div>				
                
                </div>
            
                <div class="col-md-6">
                    <h3 class="dark-grey">Terms and Conditions</h3>
                    <p>
                        By clicking on "Register" you agree to The Company's' Terms and Conditions
                    </p>
                    <p>
                        While rare, prices are subject to change based on exchange rate fluctuations - 
                        should such a fluctuation happen, we may request an additional payment. You have the option to request a full refund or to pay the new price. (Paragraph 13.5.8)
                    </p>
                    <p>
                        Should there be an error in the description or pricing of a product, we will provide you with a full refund (Paragraph 13.5.6)
                    </p>
                    <p>
                        Acceptance of an order by us is dependent on our suppliers ability to provide the product. (Paragraph 13.5.6)
                    </p>
                    
                    <button type="submit" class="btn btn-primary">Register</button>
                </div>
            </div>
        </section>
    </div> --}}
@endsection
@extends('layouts.master')

@section('content')

<div class="container-fluid">
    <section class="container pt-50 pb-50">
            <form method="POST" action="{{ route('password.request') }}">
                @csrf
                
                <input type="hidden" name="token" value="{{ $token }}">

                <div class="container-page">
                    <div class="col-md-3"></div>				
                    <div class="col-md-6">
                        <h3 class="dark-grey text-center">{{ __('Reset Password') }}</h3>
                        
                        <div class="form-group">
                            <label>E-mail Address</label>
                            <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autofocus>
                            @if ($errors->has('email'))
                                <span class="invalid-feedback">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                            @endif
                        </div>
                                    
                        <div class="form-group">
                            <label>Password</label>
                            <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>
                            @if ($errors->has('password'))
                                <span class="invalid-feedback">
                                    <strong>{{ $errors->first('password') }}</strong>
                                </span>
                            @endif
                        </div>
                        
                        <div class="form-group">
                            <label>Confirm Password</label>
                            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                        </div>	
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">{{ __('Reset Password') }}</button>
                        </div>
                    </div>
                </div>
            </form>
    </section>
</div>

    @endsection

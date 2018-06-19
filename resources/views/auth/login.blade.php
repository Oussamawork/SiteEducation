@extends ('layouts.master')

@section ('title')
    Login
@endsection

@section('content')
<!-- Login start -->
<div class="login-area pt-150 pb-150">
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-md-offset-3 text-center">
                <div class="login">
                    <div class="login-form-container">
                        @if(Session('info'))
                            <div class="row text-center">
                                <div class="col-md-12">
                                    <p class="alert alert-danger danger">{{ Session('info') }}</p>
                                </div>
                            </div>
                        @endif
                        <div class="login-text">
                            <h2>login</h2>
                            <span>Please login using account detail bellow.</span>
                        </div>
                        <div class="login-form">
                            <form method="post" action="{{ route('authentification') }}">
                                {{ csrf_field()}}
                                
                            
                                <input type="email" name="email" placeholder="email">

                                @if ($errors->has('email'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif

                                <input type="password" name="password" placeholder="Password">

                                @if ($errors->has('password'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif

                                <div class="button-box">
                                    <div class="login-toggle-btn">
                                        <input type="checkbox" id="remember" {{ old('remember') ? 'checked' : '' }}>
                                        <label for="remember">Remember me</label>
                                        <a href="{{ route('password.request') }}">Forgot Password?</a>
                                    </div>
                                    <button type="submit" class="default-btn">Login</button>
                                </div>
                                
                            </form>
                        </div>
                    </div>  
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Login end -->
@endsection

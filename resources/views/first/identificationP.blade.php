@extends ('layouts.master')

@section ('title')
    Identification
@endsection

@section ('content')
    <!-- Register start -->
    <div class="register-area pt-150 pb-150">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 col-md-offset-3 text-center">
                        <div class="login">
                            <div class="login-form-container">
                                @if(Session('info'))
                                    <div class="row text-center">
                                        <div class="col-md-12">
                                            <p class="alert alert-info danger">{{ Session('info') }}</p>
                                        </div>
                                    </div>
                                @endif
                                <div class="login-text">
                                    <h2>Sign up</h2>
                                    <span>Please sign up using your CNI.</span>
                                </div>
                                <div class="login-form text-center">
                                    <form action="{{ route('verificationP') }}" method="post">
                                        @csrf
                                        <div class="col-md-12">
                                            <input type="text" id="identification" name="identification" value="{{ Session('identification') ? Session('identification') : old('identification') }}" placeholder="CNI">                                        
                                                @if ($errors->has('identification'))
                                                    <span class="invalid-feedback">
                                                        <h4>{{ $errors->first('identification') }}</h4>
                                                    </span>
                                                @endif
                                        </div>
                                        <button type="submit" class="default-btn">sign up</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>

        <!-- Register end --> 
@endsection
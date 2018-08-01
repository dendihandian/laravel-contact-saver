@extends('layouts.app')

@section('extra-style')
<style>
/* styling requires the .btn class, the .btn-social class, and then the social network
    class that you want to style it as (such as .btn-facebook)*/

/* Support for Facebook, Twitter, Github, Google, LinkedIn, Instagram, Yahoo, Dropbox */

/* Example:
  <a class="btn btn-social btn-facebook">
    <span class="fa fa-facebook"></span>
    Login with Facebook
  </a>
*/

.btn-social {
  position: relative;
  text-align: left;
  text-overflow: ellipsis;
  color: white;
  padding-left: 40px;
}

.btn-social:hover {
  color: white;
}

.btn-social > :first-child {
    position: absolute;
    left: 0;
    top: 0;
    bottom: 0;
    width: 30px;
    line-height: 1.6em;
    font-size: 1.6em;
    text-align: center;
    border-right: 1px solid rgba(0, 0, 0, 0.2);
}

.btn-social.btn-facebook {
  background-color: #3b5998;
}

.btn-social.btn-facebook:hover {
  background-color: #324b80;
}

.btn-social.btn-twitter {
  background-color: #55acee;
}

.btn-social.btn-twitter:hover {
  background-color: #369deb;
}

.btn-social.btn-github {
  background-color: #444;
}

.btn-social.btn-github:hover {
  background-color: #333;
}

.btn-social.btn-google {
  background-color: #dd4b39;
}

.btn-social.btn-google:hover {
  background-color: #d03724;
}

.btn-social.btn-linkedin {
  background-color: #007bb6;
}

.btn-social.btn-linkedin:hover {
  background-color: #006494;
}

.btn-social.btn-instagram {
  background-color: #3f729b;
}

.btn-social.btn-instagram:hover {
  background-color: #356083;
}

.btn-social.btn-yahoo {
  background-color: #720e9e;
}

.btn-social.btn-yahoo:hover {
  background-color: #5b0b7f;
}

.btn-social.btn-dropbox {
  background-color: #1087dd;
}

.btn-social.btn-dropbox:hover {
  background-color: #0e74bd;
}
</style>
@endsection

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card border border-dark">
                <div class="card-header text-light bg-dark">{{ __('Register') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}" aria-label="{{ __('Register') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" required autofocus>

                                @if ($errors->has('name'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required>

                                @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="invalid-feedback" role="alert">
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

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div><!-- .card-body -->
                <div class="card-footer">
                  <a href="{{ url('login/facebook') }}" class="btn btn-social btn-facebook">
                    <i class="fab fa-facebook-f"></i>
                    Sign Up with Facebook
                  </a>
                  <a href="{{ url('login/github') }}" class="btn btn-social btn-github">
                    <i class="fab fa-github"></i>
                    Sign Up with Github
                  </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

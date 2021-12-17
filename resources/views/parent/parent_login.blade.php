@extends('layouts.frontend')
@section('title', '| Parent Login')
 
@section('content')
    <!-- Start Login 
    ============================================= -->
    <div class="login-area default-padding">
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-md-offset-3">
                    <form method="POST" action="{{ route('parent.login.submit') }}" id="login-form" class="white-popup-block">
                        {{ csrf_field() }}
                        <div class="login-custom">
                            <div class="heading">
                                <h4><i class="fas fa-sign-in-alt"></i> Parent Login</h4>
                            </div>
                            <div class="col-md-12">
                                <div class="row">
                                    <div class="form-group">
                                        <input name="email" value="{{ old('email') }}" class="form-control" placeholder="Email*" type="email">
                                        @if ($errors->has('email'))
                                        <span class="help-block">
                                            <span class="text-danger">{{ $errors->first('email') }}</span>
                                        </span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="row">
                                    <div class="form-group">
                                        <input name="password" value="{{ old('password') }}" class="form-control" placeholder="Password*" type="password">
                                        @if ($errors->has('password'))
                                        <span class="help-block">
                                            <span class="text-danger">{{ $errors->first('password') }}</span>
                                        </span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="row">
                                    <label for="login-remember">
                                        <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : ''}}>Remember Me
                                    </label>
                                    <a title="Lost Password" href="{{ route('parent.password.request') }}" class="lost-pass-link">
                                        Forgot Your Password?
                                    </a>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="row">
                                    <button type="submit">
                                        Login
                                    </button>
                                </div>
                            </div>
                        </div>
                        <div class="login-social">
                            <h4>Login with social</h4>
                            <ul>
                                <li class="facebook">
                                    <a href="#">
                                        <i class="fab fa-facebook-f"></i>
                                    </a>
                                </li>
                                <li class="twitter">
                                    <a href="#">
                                        <i class="fab fa-twitter"></i>
                                    </a>
                                </li>
                                <li class="linkedin">
                                    <a href="#">
                                        <i class="fab fa-linkedin-in"></i>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- End Login Area -->
@endsection

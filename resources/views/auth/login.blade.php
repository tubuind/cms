@extends('layouts.auth')

@section('content')

    <!-- Content area -->
    <div class="content">

        <!-- Advanced login -->
        <form method="POST" action="{{ route('login') }}">
            {{ csrf_field() }}
            <div class="panel panel-body login-form">
                <div class="text-center">
                    <div class="icon-object border-warning-400 text-warning-400"><i class="icon-people"></i></div>
                    <h5 class="content-group-lg">Login to your account <small class="display-block">Enter your credentials</small></h5>
                </div>

                <div class="form-group has-feedback has-feedback-left">
                    <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" placeholder="Email" required autofocus>

                    @if ($errors->has('email'))
                        <span class="label-error">
                            {{ $errors->first('email') }}
                        </span>
                    @endif
                    <div class="form-control-feedback">
                        <i class="icon-user text-muted"></i>
                    </div>
                </div>

                <div class="form-group has-feedback has-feedback-left">
                    <input id="password" type="password" class="form-control" name="password"  placeholder="Password" required>

                    @if ($errors->has('password'))
                        <span class="label-error">
                            {{ $errors->first('password') }}
                        </span>
                    @endif
                    <div class="form-control-feedback">
                        <i class="icon-lock2 text-muted"></i>
                    </div>
                </div>

                <div class="form-group login-options">
                    <div class="row">
                        <div class="col-sm-6">
                            <label class="checkbox-inline">
                                <input type="checkbox" class="styled" name="remember" {{ old('remember') ? 'checked' : '' }}>
                                Remember

                            </label>
                        </div>

                        <div class="col-sm-6 text-right">
                            <a href="{{ route('password.request') }}">
                                Forgot Password?
                            </a>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <button type="submit" class="btn bg-blue btn-block">Login <i class="icon-circle-right2 position-right"></i></button>
                </div>

                {{--<div class="content-divider text-muted form-group"><span>or sign in with</span></div>--}}
                {{--<ul class="list-inline form-group list-inline-condensed text-center">--}}
                {{--<li><a href="#" class="btn border-indigo text-indigo btn-flat btn-icon btn-rounded"><i class="icon-facebook"></i></a></li>--}}
                {{--<li><a href="#" class="btn border-pink-300 text-pink-300 btn-flat btn-icon btn-rounded"><i class="icon-dribbble3"></i></a></li>--}}
                {{--<li><a href="#" class="btn border-slate-600 text-slate-600 btn-flat btn-icon btn-rounded"><i class="icon-github"></i></a></li>--}}
                {{--<li><a href="#" class="btn border-info text-info btn-flat btn-icon btn-rounded"><i class="icon-twitter"></i></a></li>--}}
                {{--</ul>--}}

                <div class="content-divider text-muted form-group"><span>Don't have an account?</span></div>
                <a href="{{ route('register') }}" class="btn bg-slate btn-block content-group">Register</a>
                <span class="help-block text-center no-margin">By continuing, you're confirming that you've read our <a href="#">Terms &amp; Conditions</a> and <a href="#">Cookie Policy</a></span>
            </div>
        </form>
        <!-- /advanced login -->

    </div>
    <!-- /content area -->

@endsection


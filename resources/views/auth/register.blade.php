@extends('layouts.auth')

@section('content')

<!-- Content area -->
<div class="content">

    <!-- Registration form -->
    <form method="POST" action="{{ route('register') }}">
        {{ csrf_field() }}

        <div class="row">
            <div class="col-lg-6 col-lg-offset-3">
                <div class="panel registration-form">
                    <div class="panel-body">
                        <div class="text-center">
                            <div class="icon-object border-success text-success"><i class="icon-plus3"></i></div>
                            <h5 class="content-group-lg">Create account <small class="display-block">All fields are required</small></h5>
                        </div>

                        <div class="form-group has-feedback has-feedback-left">
                            <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required autofocus>

                            @if ($errors->has('name'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('name') }}</strong>
                                </span>
                            @endif
                            <div class="form-control-feedback">
                                <i class="icon-user-plus text-muted"></i>
                            </div>
                        </div>

                        <div class="form-group has-feedback has-feedback-left">
                            <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>

                            @if ($errors->has('email'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                            @endif
                            <div class="form-control-feedback">
                                <i class="icon-user-plus text-muted"></i>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group has-feedback has-feedback-left">
                                    <input id="password" type="password" class="form-control" name="password" required>

                                    @if ($errors->has('password'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                    @endif
                                    <div class="form-control-feedback">
                                        <i class="icon-user-lock text-muted"></i>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group has-feedback has-feedback-left">
                                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                                    <div class="form-control-feedback">
                                        <i class="icon-user-lock text-muted"></i>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            {{--<div class="checkbox">--}}
                                {{--<label>--}}
                                    {{--<input type="checkbox" class="styled" checked="checked">--}}
                                    {{--Send me <a href="#">test account settings</a>--}}
                                {{--</label>--}}
                            {{--</div>--}}

                            {{--<div class="checkbox">--}}
                                {{--<label>--}}
                                    {{--<input type="checkbox" class="styled" checked="checked">--}}
                                    {{--Subscribe to monthly newsletter--}}
                                {{--</label>--}}
                            {{--</div>--}}

                            {{--<div class="checkbox">--}}
                                {{--<label>--}}
                                    {{--<input type="checkbox" class="styled">--}}
                                    {{--Accept <a href="#">terms of service</a>--}}
                                {{--</label>--}}
                            {{--</div>--}}
                        </div>

                        <div class="text-right">
                            <a class="btn btn-link" href="{{ route('login') }}"><i class="icon-arrow-left13 position-left"></i> Back to login form</a>
                            <button type="submit" class="btn bg-teal-400 btn-labeled btn-labeled-right ml-10"><b><i class="icon-plus3"></i></b> Create account</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
    <!-- /registration form -->

</div>
<!-- /content area -->


@endsection

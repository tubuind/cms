@extends('layouts.master')

@section('content')
    <!-- Basic datatable -->
    <div class="panel panel-flat">
        <div class="panel-heading">
            <h5 class="panel-title">{{ __('permission.add_new_permissions') }}</h5>
            <div class="heading-elements">
                <ul class="icons-list">
                    <li><a data-action="collapse"></a></li>
                    <li><a data-action="reload"></a></li>
                    <li><a data-action="close"></a></li>
                </ul>
            </div>
        </div>

        <div class="panel-body">
            {{ Form::model($model, array('route' => 'admin.permission.store', 'class' => 'form-horizontal form-validate-jquery')) }}
                <fieldset class="content-group">
                    <legend class="text-bold">Input info</legend>

                    <!-- Basic text input -->
                    <div class="form-group">
                        <label class="control-label col-lg-3">Name Action <span class="text-danger">*</span></label>
                        <div class="col-lg-9">
                            {{ Form::text('name', '', ['class' => 'form-control', 'required' => 'required', 'placeholder' => 'Name Action Allow']) }}
                            @if ($errors->has('name'))
                                <span class="label-error">
                                    {{ $errors->first('name') }}
                                </span>
                            @endif
                        </div>
                    </div>
                    <!-- /basic text input -->

                    <!-- Basic text input -->
                    <div class="form-group">
                        <label class="control-label col-lg-3"></label>
                        <div class="col-lg-9">
                            @if ($errors->has('unknown_error'))
                                <span class="label-error">
                            {{ $errors->first('unknown_error') }}
                        </span>
                            @endif
                        </div>
                    </div>
                    <!-- /basic text input -->

                </fieldset>

                <div class="text-right">
                    <button type="reset" class="btn btn-default" id="reset">Reset <i class="icon-reload-alt position-right"></i></button>
                    <button type="submit" class="btn btn-primary">Submit <i class="icon-arrow-right14 position-right"></i></button>
                </div>

            {{ Form::close() }}

</div>
</div>
@endsection
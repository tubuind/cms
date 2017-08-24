@extends('layouts.master')

@section('content')
    <!-- Basic datatable -->
    <div class="panel panel-flat">
        <div class="panel-heading">
            <h5 class="panel-title">{{ __('permission.list_permissions') }}</h5>
            <div class="heading-elements">
                <ul class="icons-list">
                    <li><a data-action="collapse"></a></li>
                    <li><a data-action="reload"></a></li>
                    <li><a data-action="close"></a></li>
                </ul>
            </div>
        </div>

        <div class="panel-body">
            <form class="form-horizontal form-validate-jquery" action="#">
                <fieldset class="content-group">
                    <legend class="text-bold">Input info</legend>

                    <!-- Basic text input -->
                    <div class="form-group">
                        <label class="control-label col-lg-3">Basic text input <span class="text-danger">*</span></label>
                        <div class="col-lg-9">
                            <input type="text" name="basic" class="form-control" required="required" placeholder="Text input validation">
                        </div>
                    </div>
                    <!-- /basic text input -->


                    <!-- Input with icons -->
                    <div class="form-group has-feedback">
                        <label class="control-label col-lg-3">Input with icon <span class="text-danger">*</span></label>
                        <div class="col-lg-9">
                            <input type="text" name="with_icon" class="form-control" required="required" placeholder="Text input with icon validation">
                            <div class="form-control-feedback">
                                <i class="icon-droplets"></i>
                            </div>
                        </div>
                    </div>
                    <!-- /input with icons -->


                    <!-- Input group -->
                    <div class="form-group">
                        <label class="control-label col-lg-3">Input group <span class="text-danger">*</span></label>
                        <div class="col-lg-9">
                            <div class="input-group">
                                <div class="input-group-addon"><i class="icon-mention"></i></div>
                                <input type="text" name="input_group" class="form-control" required="required" placeholder="Input group validation">
                            </div>
                        </div>
                    </div>
                    <!-- /input group -->


                    <!-- Password field -->
                    <div class="form-group">
                        <label class="control-label col-lg-3">Password field <span class="text-danger">*</span></label>
                        <div class="col-lg-9">
                            <input type="password" name="password" id="password" class="form-control" required="required" placeholder="Minimum 5 characters allowed">
                        </div>
                    </div>
                    <!-- /password field -->


                    <!-- Repeat password -->
                    <div class="form-group">
                        <label class="control-label col-lg-3">Repeat password <span class="text-danger">*</span></label>
                        <div class="col-lg-9">
                            <input type="password" name="repeat_password" class="form-control" required="required" placeholder="Try different password">
                        </div>
                    </div>
                    <!-- /repeat password -->


                    <!-- Email field -->
                    <div class="form-group">
                        <label class="control-label col-lg-3">Email field <span class="text-danger">*</span></label>
                        <div class="col-lg-9">
                            <input type="email" name="email" class="form-control" id="email" required="required" placeholder="Enter a valid email address">
                        </div>
                    </div>
                    <!-- /email field -->

                </fieldset>

                <div class="text-right">
                    <button type="reset" class="btn btn-default" id="reset">Reset <i class="icon-reload-alt position-right"></i></button>
                    <button type="submit" class="btn btn-primary">Submit <i class="icon-arrow-right14 position-right"></i></button>
                </div>
            </form>
        </div>
    </div>
@endsection
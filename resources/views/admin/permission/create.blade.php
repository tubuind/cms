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
            {{
                Form::model($permission, [
                    'route' => 'permission.store',
                    'class' => 'form-horizontal form-validate-jquery',
                    'method' => 'POST'
                ])
            }}

            {{ method_field("POST") }}

            @include('admin.permission._form')

            {{ Form::close() }}
        </div>
    </div>
@endsection
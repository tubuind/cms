@extends('layouts.master')

@section('content')
    <!-- Basic datatable -->
    <div class="panel panel-flat">
        <div class="panel-heading">
            <h5 class="panel-title">{{ __('permission.update_permissions') }}</h5>
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
                Form::model($permission, array(
                    'route' => [ 'permission.update', $permission->id ],
                    'class' => 'form-horizontal form-validate-jquery',
                ))
            }}

            {{ method_field("PUT") }}

            @include('admin.permission._form')

            {{ Form::close() }}
        </div>
    </div>
@endsection
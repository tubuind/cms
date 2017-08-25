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

            <a href="{{ config('app.url', '') }}/admin/permission/create" type="button" class="btn border-slate text-slate-800 btn-flat pull-right">
                <i class="icon-cog3 position-left"></i> Add New
            </a>

            <table class="table" id="datatable-user">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Created Date</th>
                        <th>Updated Date</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                </tbody>
            </table>
        </div>
    </div>
    <script>
        $(function(){
            $('#datatable-user').DataTable({
                'processing': true,
                'serverSide': true,
                'target': 0,
                'ajax': {
                    'url': '{{ config('app.url', '') }}/api/v1/admin/permission/list',
                    'type': 'POST',
                    'data': function(d){
                        d.model = 'App/Model/Permission',
                        d.search_columns = ['name', 'created_at', 'status'];
                    }
                },
                'columns': [                    
                    { 'data': 'name', 'orderable': true },
                    { 'data': 'created_at', 'orderable': true },
                    { 'data': 'updated_at', 'orderable': true },
                    { 'data': 'status', 'orderable': true },
                    { 
                        'data': null, 
                        'orderable': false,
                        'render': function(){ 
                            return '';                            
                        }
                    },
                ]
            });
        });
    </script>
@endsection
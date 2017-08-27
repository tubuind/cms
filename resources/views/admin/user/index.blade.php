@extends('layouts.master')

@section('content')
    <!-- Basic datatable -->
    <div class="panel panel-flat">
        <div class="panel-heading">
            <h5 class="panel-title">{{ __('user.list_users') }}</h5>
            <div class="heading-elements">
                <ul class="icons-list">
                    <li><a data-action="collapse"></a></li>
                    <li><a data-action="reload"></a></li>
                    <li><a data-action="close"></a></li>
                </ul>
            </div>
        </div>

        <div class="panel-body">
            <table class="table" id="datatable-user">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Created Date</th>
                        <th>Verified</th>
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
                    'url': '{{ config('app.url', '') }}/api/v1/admin/user/list',
                    'type': 'POST',
                    'data': function(d){
                        d.model = 'App/Model/User',
                        d.search_columns = ['name','email', 'created_at', 'status'];
                    }
                },
                'columns': [                    
                    { 'data': 'name', 'orderable': true },
                    { 'data': 'email', 'orderable': true },
                    { 'data': 'created_at', 'orderable': true },
                    { 
                        'data': 'is_verified', 
                        'orderable': true,
                        'render': function(data, type, row){
                            if(data == 0)
                                return 'No';
                            else
                                return 'Yes';
                        }
                    },                
                    { 'data': 'status', 'orderable': true },
                    { 
                        'data': null, 
                        'orderable': false,
                        'render': function(){
                            return '<ul class="icons-list"><li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="icon-menu9"></i></a><ul class="dropdown-menu dropdown-menu-right"><li><a href="#"><i class="icon-file-pdf"></i> Export to .pdf</a></li><li><a href="#"><i class="icon-file-excel"></i> Export to .csv</a></li></ul></li></ul>';
                        }
                    },
                ]
            });
        });
    </script>
@endsection
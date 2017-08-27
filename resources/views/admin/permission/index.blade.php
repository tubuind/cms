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
                        <th>Action</th>
                        {{--<th>Created Date</th>--}}
                        {{--<th>Updated Date</th>--}}
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
                        d.search_columns = ['name', 'action', 'status'];
                    }
                },
                'columns': [                    
                    { 'data': 'name', 'orderable': true },
                    { 'data': 'action', 'orderable': true },
//                    { 'data': 'created_at', 'orderable': true },
//                    { 'data': 'updated_at', 'orderable': true },
                    { 'data': 'status', 'orderable': true },
                    { 
                        'data': null, 
                        'orderable': false,
                        'render': function(data, type, row, meta){
                            var render = '<a href="{{ config('app.url', '') }}/admin/permission/'+ data.id +'/edit" type="button" class="text-slate-800"><i class="icon-eye"></i></a>';
                            render += '<form class="virtual-form-delete" method="POST" action="{{ config('app.url', '') }}/admin/permission/'+ data.id +'">{{ csrf_field() }} {{ method_field("DELETE") }}<button type="submit" onclick="CMS.formConfirm(event, this.form);" class="btn text-slate-800 btn-flat"><i class="icon-cross"></i></button></form>';
                            return render;
                        }
                    },
                ]
            });
        });
    </script>

    <?php
        if(isset($notification)){
    ?>
    <script>
        CMS.showNotify('Error', '{{ $notification }}', true);
    </script>
    <?php
        }

    ?>
@endsection
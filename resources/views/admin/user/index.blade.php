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
                        <th><input type="checkbox" class="check-all" /></th>
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
                processing: true,
                serverSide: true,
                target: 0,
                ajax: {
                    url: '{{ config('app.url', '') }}/api/v1/admin/user/list',
                    type: 'POST',
                    data: function(d){
                        d.model = 'App/Model/User',
                        d.search_columns = ['name','email', 'created_at', 'status'];
                    }
                },
                columns: [
                    {
                        data: null,
                        orderable: false ,
                        render: function(data, type, row, meta){
                            return '<input type="checkbox" class="check-all" />'
                        }
                    },
                    {
                        data: 'name',
                        orderable: true
                    },
                    {
                        data: 'email',
                        orderable: true
                    },
                    {
                        data: 'created_at',
                        orderable: true,
                        render: function(data, type, row, meta){
                            return data.date.split(' ')[0];
                        }

                    },
                    {
                        data: 'is_verified',
                        orderable: true,
                        render: function(data, type, row){
                            if(data == 0)
                                return 'No';
                            else
                                return 'Yes';
                        }
                    },
                    {
                        data: 'status',
                        orderable: true
                    },
                    {
                        data: null,
                        orderable: false,
                        render: function(data, type, row, meta){
                            var render = '<a href="{{ config('app.url', '') }}/admin/user/'+ data.id +'/edit" type="button" class="text-slate-800"><i class="icon-eye"></i></a>';
                            render += '<form class="virtual-form-delete" method="POST" action="{{ config('app.url', '') }}/admin/user/'+ data.id +'">{{ csrf_field() }} {{ method_field("DELETE") }}<button type="submit" onclick="CMS.formConfirm(event, this.form);" class="btn text-slate-800 btn-flat"><i class="icon-cross"></i></button></form>';
                            return render;
                        }
                    },
                ]
            });
        });
    </script>
@endsection
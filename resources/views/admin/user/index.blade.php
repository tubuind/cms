@extends('layouts.master')

@section('content')
    <!-- Basic datatable -->
    <div class="panel panel-flat">
        <div class="panel-heading">
            <h5 class="panel-title">Default style</h5>
            <div class="heading-elements">
                <ul class="icons-list">
                    <li><a data-action="collapse"></a></li>
                    <li><a data-action="reload"></a></li>
                    <li><a data-action="close"></a></li>
                </ul>
            </div>
        </div>

        <div class="panel-body">
        <?php
            Helper::DataTable([
                'id' => 'datatable-user',
                'url' => '/api/v1/admin/user/list',
                'model' => 'App/Model/User',
                'columns' => [
                    [
                        'label' => 'Name',
                        'attribute' => 'name',                   
                    ],
                    [
                        'label' => 'Email',
                        'attribute' => 'email',                                             
                    ],
                    [
                        'label' => 'Created Date',
                        'attribute' => 'created_at',                   
                    ],
                    [
                        'label' => 'Updated Date',
                        'attribute' => 'updated_at',                      
                    ]
                ],
                'search' => ['name','email']
            ]);
        ?>
        </div>


    </div>

@endsection
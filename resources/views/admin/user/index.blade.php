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
                'columns' => [
                    [
                        'label' => 'Name',
                        'value' => function($item){
                            return $item->name;
                        }
                    ],
                    [
                        'label' => 'Email',
                        'value' => function($item){
                            return $item->email;
                        }
                    ]
                ]
            ]);
        ?>
        </div>


    </div>

@endsection
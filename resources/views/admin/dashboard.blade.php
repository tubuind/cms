@extends('layouts.master')

@section('content')
    <h3>I'm Dashboard</h3>
    <?php foreach ($model as $value){
        echo $value->name;
    } ?>
@endsection
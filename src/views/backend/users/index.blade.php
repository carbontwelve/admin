@extends('admin::backend/layouts/default')

{{-- Title --}}
@section('title')
User Management
@parent
@stop

{{-- Content --}}
@section('content')

<div class="container auto-max-width">
    <div class="page-header">
        <h1>
            <span class="glyphicon glyphicon-pushpin reposition"></span>
            User
            <small>Management</small>

            <div class="pull-right">
                <a class="btn btn-small btn-info" href="#">
                    <span class="glyphicon glyphicon-question-sign"></span>
                </a>

                <a class="btn btn-small btn-primary" href="{{ route('administration.users.add') }}">
                    <span class="glyphicon glyphicon-plus-sign"></span>
                    Add New
                </a>
            </div>
        </h1>
    </div>



</div>
@stop

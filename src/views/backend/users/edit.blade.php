@extends('admin::backend/layouts/default')

{{-- Title --}}
@section('title')
User Management &ndash; Modify User Record
@parent
@stop

{{-- Content --}}
@section('content')

<div class="container auto-max-width">
    <div class="page-header">
        <h1>
            <span class="glyphicon glyphicon-user reposition"></span>
            User
            <small>Modify</small>

            <div class="pull-right">
                <a class="btn btn-small btn-info" href="#">
                    <span class="glyphicon glyphicon-question-sign"></span>
                </a>

                <a class="btn btn-small btn-primary" href="{{ route('administration.users.index') }}">
                    <span class="glyphicon glyphicon-circle-arrow-left"></span>
                    Back
                </a>
            </div>
        </h1>
    </div>



</div>
@stop

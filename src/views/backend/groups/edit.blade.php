@extends('admin::backend/layouts/default')

{{-- Title --}}
@section('title')
Group Management &ndash; Modify Group Record
@parent
@stop

{{-- Content --}}
@section('content')

<div class="container auto-max-width">
    <div class="page-header">
        <h1>
            <span class="glyphicon glyphicon-pushpin reposition"></span>
            Group
            <small>Modify</small>

            <div class="pull-right">
                <a class="btn btn-small btn-info" href="#">
                    <span class="glyphicon glyphicon-question-sign"></span>
                </a>

                <a class="btn btn-small btn-primary" href="{{ route('administration.groups.index') }}">
                    <span class="glyphicon glyphicon-circle-arrow-left"></span>
                    Back
                </a>
            </div>
        </h1>
    </div>



</div>
@stop

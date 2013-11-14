@extends('admin::backend/layouts/default')

{{-- Title --}}
@section('title')
Dashboard
@parent
@stop

{{-- Content --}}
@section('content')

<div class="container auto-max-width">
    <div class="page-header">
        <h1>
            <span class="glyphicon glyphicon-th reposition"></span>
            Dashboard

            <div class="pull-right">
                <a class="btn btn-small btn-info" href="#">
                    <span class="glyphicon glyphicon-question-sign"></span>
                </a>
            </div>
        </h1>
    </div>

    <div class="row">
        @foreach ($widgets->getItems() as $pane)
        {{ $pane->value }}
        @endforeach
    </div>

</div>



@stop

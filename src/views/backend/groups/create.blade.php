@extends('admin::backend/layouts/default')

{{-- Title --}}
@section('title')
Group Management &ndash; Create New Group
@parent
@stop

{{-- Content --}}
@section('content')

<div class="container auto-max-width">
    <div class="page-header">
        <h1>
            <span class="glyphicon glyphicon-wrench reposition"></span>
            Group
            <small>Create</small>

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

    <ul class="nav nav-tabs">
        <li class="active"><a href="#tab-general" data-toggle="tab">General</a></li>
        <li><a href="#tab-permissions" data-toggle="tab">Permissions</a></li>
    </ul>

    <div class="tab-content">
        <div class="tab-pane active" id="tab-general">
            <div class="panel panel-default" style="margin-top:-1px;">
                <div class="panel-body">
                    <form class="form-horizontal" role="form">
                        <div class="form-group">
                            <label for="name" class="col-lg-2 control-label">Name</label>
                            <div class="col-lg-10">
                                <input type="name" class="form-control" id="name" placeholder="Group Name">
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-lg-offset-2 col-lg-10 text-right">
                                <a href="{{ route('administration.groups.index') }}" class="btn btn-link">Cancel</a>
                                <button type="reset" class="btn btn-default">Reset</button>
                                <button type="submit" class="btn btn-success">Create Group</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

        </div>
        <div class="tab-pane" id="tab-permissions">...</div>

    </div>
</div>
@stop

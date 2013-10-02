@extends('admin::backend/layouts/default')

{{-- Title --}}
@section('title')
Group Management
@parent
@stop

{{-- Content --}}
@section('content')

<div class="container auto-max-width">
    <div class="page-header">
        <h1>
            <span class="glyphicon glyphicon-pushpin reposition"></span>
            Group
            <small>Management</small>

            <div class="pull-right">
                <a class="btn btn-small btn-info" href="#">
                    <span class="glyphicon glyphicon-question-sign"></span>
                </a>

                <a class="btn btn-small btn-primary" href="{{ route('administration.groups.add') }}">
                    <span class="glyphicon glyphicon-plus-sign"></span>
                    Add New
                </a>
            </div>
        </h1>
    </div>

    <table class="table table-striped table-condensed">
        <thead>
        <tr>
            <th style="width:30px;">#</th>
            <th>Group</th>
            <th>Users</th>
            <th>Created At</th>
            <th style="width: 100px;">Actions</th>
        </tr>
        </thead>
        <tbody class="table-hover">

        @if ($groups->count() >= 1)
        @foreach ( $taxonomyUnits as $taxonomyUnit )
        <tr>
            <td>{{ $group->id }}</td>
            <td>{{ $group->name }}</td>
            <td>{{ $group->users()->count() }}</td>
            <td>{{ $group->created_at->diffForHumans() }}</td>
            <td>
                <a href="#" class="btn btn-primary btn-xs">Edit</a>
                <a href="#" class="btn btn-danger btn-xs">Delete</a>
            </td>
        </tr>
        @endforeach
        @else
        <tr>
            <td colspan="3">Sorry, there are no records available.</td>
        </tr>
        @endif

        </tbody>
    </table>

    {{ $groups->links() }}

</div>
@stop

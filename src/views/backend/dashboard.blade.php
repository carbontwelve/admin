@extends('admin::backend/layouts/default')

{{-- Title --}}
@section('title')
Dashboard
@parent
@stop

{{-- Content --}}
@section('content')

<pre><?php var_dump( $administrationMenu ); ?></pre>

@stop

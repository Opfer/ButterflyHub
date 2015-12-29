@extends('layouts.master')

@section('page-name')
Something occurred!
<small>There has been an error</small>
@stop

@section('breadcrumb')
<li>
	<i class="icon-home"></i>
	<a href="{{ url('/') }}">Home</a>
	<i class="fa fa-angle-right"></i>
</li>
<li>
	<span>Error</span>
</li>
@stop

@section('content')	
<!-- BEGIN PORTLET-->
<div class="portlet light">
	<div class="text-center">
		<h2><strong>Error <i class="fa fa-frown-o"></i>: The entity you requested does not exists.</strong></h2>
		<br/>
		<p>Please check again if the entity you requested exists in the system.</p>
		<p>If the error persist please get in touch with the web admin.</p>
	</div>
</div>
<!-- END PORTLET-->                           
@stop
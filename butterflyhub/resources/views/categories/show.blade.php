@extends('layouts.master')

@section('page-name')
Category Detail
<small>{{ $category->name }}</small>
@stop

@section('taxa-active')
	active open
@stop
@section('taxa-arrow-open')
	open
@stop
@section('sm-categorylist-open')
	active open
@stop

@section('breadcrumb')
<li>
	<i class="icon-home"></i>
	<a href="{{ url('/') }}">Home</a>
	<i class="fa fa-angle-right"></i>
</li>
<li>
	<a href="{{ url('taxa') }}">Taxa</a>
	<i class="fa fa-angle-right"></i>
</li>
<li>
	<a href="{{ url('categories') }}">Taxa categories</a>
	<i class="fa fa-angle-right"></i>
</li>
<li>
	<span>Category detail</span>
</li>
@stop

@section('actions')
<li>
	<a href="{{ url('categories/'.$category->id.'/edit') }}">
		<i class="fa fa-pencil-square-o"></i> Edit category
	</a>
</li>
@stop

@section('content')	
<!-- BEGIN PORTLET-->
<div class="portlet light">
	<div class="detail">
		<div class="register-detail">
			<h3 class="detail-title title-1">Name: {{ $category->name }}</h3>
			@if (session('status'))
				<div class="alert alert-success fade in">
					<a href="#" class="close" data-dismiss="alert" aria-label="close">X</a>
					{{ session('status') }}
				</div>
			@endif
			<div class="row">
				<div class="col-md-6">
					<div class="form-horizontal">
						<div class="form-group">
							<label for="id" class="col-sm-3 control-label"><strong>ID</strong></label>
							<div class="col-sm-9">
								<label class="control-label" id="id">{{ $category->id }}</label>
							</div>
						</div>
						<div class="form-group">
							<label for="name" class="col-sm-3 control-label"><strong>Name</strong></label>
							<div class="col-sm-9">
								<label class="control-label" id="name">{{ $category->name }}</label>
							</div>
						</div>
						<div class="form-group">
							<label for="name" class="col-sm-3 control-label"><strong>Father</strong></label>
							<div class="col-sm-9">
								<label class="control-label" id="name">
									@if ($category->father_category['name'] == '')
										None
									@else
										<a href="{{ url('categories/'.$category->father_category['id']) }}">
											{{ $category->father_category['name'] }}
										</a>
									@endif								
								</label>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>		
		<div class="auditory">
			<h4 class="detail-title title-2">Auditory data</h4>
			<div class="row">
				<div class="col-md-6">
					<div class="form-horizontal">
						<div class="form-group">
							<label for="created_at" class="col-sm-3 control-label">Created at</label>
							<div class="col-sm-9">
								<input type="text" class="form-control" value="{{ $category->created_at }}" id="created_at" readonly>
							</div>
						</div>
						<div class="form-group">
							<label for="updated_at" class="col-sm-3 control-label">Updated at</label>
							<div class="col-sm-9">
								<input type="text" class="form-control" value="{{ $category->updated_at }}" id="updated_at" readonly>
							</div>
						</div>			
						<div class="form-group">
							<label for="deleted_at" class="col-sm-3 control-label">Deleted at</label>
							<div class="col-sm-9">
								<input type="text" class="form-control" value="{{ $category->deleted_at }}" id="deleted_at" readonly>
							</div>
						</div>								
					</div>
				</div>
				<div class="col-md-6">
					<div class="form-horizontal">
						<div class="form-group">
							<label for="created_by" class="col-sm-3 control-label">Created by</label>
							<div class="col-sm-9">
								<input type="text" class="form-control" value="{{ $category->created_by }}" id="created_by" readonly>
							</div>
						</div>
						<div class="form-group">
							<label for="updated_by" class="col-sm-3 control-label">Updated by</label>
							<div class="col-sm-9">
								<input type="text" class="form-control" value="{{ $category->updated_by }}" id="updated_by" readonly>
							</div>
						</div>				
					</div>
				</div>
			</div>			
		</div>
	</div>
</div>
<!-- END PORTLET-->                           
@stop
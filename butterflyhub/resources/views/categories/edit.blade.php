@extends('layouts.master')

@section('page-name')
Edit category
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
	<span>Edit category</span>
</li>
@stop

@section('content')	
<!-- BEGIN PORTLET-->
<div class="portlet light">
	<div class="detail">
		<div class="register-detail">
			<h3 class="detail-title title-1">Name: {{ $category->name }}</h3>
			{!! Form::model($category, [
				'method' => 'PATCH',
				'route' => ['categories.update', $category->id]
			]) !!}
			<div class="row">
				<div class="col-md-12">
					<div class="form-horizontal">
						<div class="form-group">
							<label for="name" class="col-sm-1 control-label">Name</label>
							<div class="col-sm-4">
								{!! Form::text('name', null, ['class' => 'form-control', 'id' => 'name']) !!}
							</div>
						</div>
						<div class="form-group">
							<label for="father" class="col-sm-1 control-label">Father</label>
							<div class="col-sm-4">
								{!! Form::select('taxon_category_id', $categories, $category->father_category['id'], ['class' => 'form-control ', 'id' => 'father']) !!}
							</div>
						</div>
						<br/>				
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-md-12">
					<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#update">Update category</button>
					<!-- Modal -->
					<div id="update" class="modal fade" role="dialog">
						<div class="modal-dialog">
							<!-- Modal content-->
							<div class="modal-content">
								<div class="modal-header">
									<button type="button" class="close" data-dismiss="modal">&times;</button>
									<h4 class="modal-title"><i class="fa fa-exclamation-triangle"></i> Update entry</h4>
								</div>
								<div class="modal-body">
									<p>Are you you want to update this entry?</p>
								</div>
								<div class="modal-footer">
									{!! Form::submit('Update category', ['class' => 'btn btn-warning']) !!}
									<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
								</div>
							</div>
						</div>
					</div>	
					<a href="{{ url('categories/'.$category->id) }}" class="btn btn-info">Back</a>
					<div class="pull-right">						
						<button type="button" class="btn btn-default" data-toggle="modal" data-target="#delete">Delete</button>						
					</div>	
				</div>
			</div>
			<br/>
			{!! Form::close() !!}	
		</div>
	</div>
</div>

<!-- Modal -->
<div id="delete" class="modal fade" role="dialog">
	<div class="modal-dialog">

		<!-- Modal content-->
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 class="modal-title"><i class="fa fa-exclamation-triangle"></i> Delete entry</h4>
			</div>
			<div class="modal-body">
				<p>Are you you want to delete this entry?</p>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-warning" data-dismiss="modal">Acept</button>
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
			</div>
		</div>
	</div>
</div>			

<!-- END PORTLET-->                           
@stop

@section('scripts')
<script>
$('form').on('keyup keypress', function(e) {
	var code = e.keyCode || e.which;
	if (code == 13) { 
		e.preventDefault();
		$('#update').modal('show');
		return false;
	}
});
</script>
@stop
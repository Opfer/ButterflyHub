@extends('layouts.master')

@section('page-name')
Taxon Detail
<small>{{ $taxon->name }}</small>
@stop

@section('taxa-active')
	active open
@stop
@section('taxa-arrow-open')
	open
@stop
@section('sm-taxalist-open')
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
	<a href="{{ url('taxa') }}">Taxa list</a>
	<i class="fa fa-angle-right"></i>
</li>
<li>
	<span>Taxon detail</span>
</li>
@stop

@section('actions')
<li>
	<a href="{{ url('taxa/'.$taxon->id.'/edit') }}">
		<i class="fa fa-pencil-square-o"></i> Edit taxon
	</a>
</li>
@stop

@section('content')	
<!-- BEGIN PORTLET-->
<div class="portlet light">
	<div class="detail">
		<div class="register-detail">
			<h3 class="taxonomy-title title-1">{!!  $taxonomy !!}</h3>
			@if (session('status'))
				<div id="alert-success" class="alert alert-success fade in">
					<a href="#" class="close" data-dismiss="alert" aria-label="close">X</a>
					{{ session('status') }}
				</div>
			@endif
			<div class="row">
				<div class="col-md-6">
					<div class="form-horizontal">
						<div class="form-group">
							<label for="name" class="col-sm-4 control-label"><strong>Name:</strong></label>
							<div class="col-sm-8">
								<label class="control-label" id="name">{{ $taxon->name }}</label>
							</div>
						</div>					
						<div class="form-group">
							<label for="id" class="col-sm-4 control-label"><strong>ID:</strong></label>
							<div class="col-sm-8">
								<label class="control-label" id="id">{{ $taxon->id }}</label>
							</div>
						</div>
						<div class="form-group">
							<label for="taxoncategory" class="col-sm-4 control-label"><strong>Category name:</strong></label>
							<div class="col-sm-8">
								<label class="control-label" id="taxoncategory">
									<a href="{{ url('categories/'.$taxon->category['id']) }}">
										{{ $taxon->category['name'] }}
									</a>
								</label>
							</div>
						</div>
					</div>
				</div>
				<div class="col-md-6">
					<div class="form-horizontal">
						<div class="form-group">
							<label for="englishname" class="col-sm-4 control-label"><strong>English name:</strong></label>
							<div class="col-sm-8">
								<label class="control-label" id="englishname">{{ $taxon->english_name }}</label>
							</div>
						</div>					
						<div class="form-group">
							<label for="taxonsort" class="col-sm-4 control-label"><strong>Taxon sort:</strong></label>
							<div class="col-sm-8">
								<label class="control-label" id="taxonsort">{{ $taxon->taxon_sort }}</label>
							</div>
						</div>
						<div class="form-group">
							<label for="name" class="col-sm-4 control-label"><strong>Father:</strong></label>
							<div class="col-sm-8">
								<label class="control-label" id="name">
									<a href="{{ url('taxa/'.$taxon->father_taxon['id']) }}">
										{{ $taxon->father_taxon['name'] }}
									</a>								
								</label>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="statistics">
			<h4 class="detail-title title-2">Taxon children tree</h4>
			<div class="table-responsive">
				<table class="table table-hover">
					<thead>
					<tr>
						<th>ID</th>
						<th>Taxon Sort</th>
						<th>Name</th>
						<th>English Name</th>
						<th>Category</th>
						<th>Parent</th>
					</tr>
					</thead>
					<tbody>
					@foreach ($taxonTree as $branch)
						<tr>
							<th scope="row">
								<a href="{{ url('taxa/'.$branch->id) }}">
									<div>
										<strong>{{ $branch->id }}</strong>
									</div>
								</a>
							</th>
							<td>
								<a href="{{ url('taxa/'.$branch->id) }}">
									<div>
										{{ $branch->taxon_sort }}
									</div>
								</a>
							</td>
							<td>
								<a href="{{ url('taxa/'.$branch->id) }}">
									<div>
										{{ $branch->name }}
									</div>
								</a>
							</td>
							<td>
								<a href="{{ url('taxa/'.$branch->id) }}">
									<div>
										{{ $branch->english_name }}
									</div>
								</a>
							</td>
							<td>
								<a href="{{ url('categories/'.$branch->category['id']) }}">
									<div>
										{{ $branch->category['name'] }}
									</div>
								</a>
							</td>
							<td>
								<a href="{{ url('taxa/'.$branch->father_taxon['id']) }}">
									<div>
										{{ $branch->father_taxon['name'] }}
									</div>
								</a>
							</td>
						</tr>
					@endforeach
					</tbody>
				</table>

				<div class="paginator">
					{!! str_replace('/?', '?', $taxonTree->render()) !!}
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
								<input type="text" class="form-control" value="{{ $taxon->created_at }}" id="created_at" readonly>
							</div>
						</div>
						<div class="form-group">
							<label for="updated_at" class="col-sm-3 control-label">Updated at</label>
							<div class="col-sm-9">
								<input type="text" class="form-control" value="{{ $taxon->updated_at }}" id="updated_at" readonly>
							</div>
						</div>			
						<div class="form-group">
							<label for="deleted_at" class="col-sm-3 control-label">Deleted at</label>
							<div class="col-sm-9">
								<input type="text" class="form-control" value="{{ $taxon->deleted_at }}" id="deleted_at" readonly>
							</div>
						</div>								
					</div>
				</div>
				<div class="col-md-6">
					<div class="form-horizontal">
						<div class="form-group">
							<label for="created_by" class="col-sm-3 control-label">Created by</label>
							<div class="col-sm-9">
								<input type="text" class="form-control" value="{{ $taxon->created_by }}" id="created_by" readonly>
							</div>
						</div>
						<div class="form-group">
							<label for="updated_by" class="col-sm-3 control-label">Updated by</label>
							<div class="col-sm-9">
								<input type="text" class="form-control" value="{{ $taxon->updated_by }}" id="updated_by" readonly>
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

@section('scripts')
<script>
	$("#alert-success").fadeTo(6000, 500).slideUp(500, function(){
		$("#alert-success").alert('close');
	});
</script>
@stop
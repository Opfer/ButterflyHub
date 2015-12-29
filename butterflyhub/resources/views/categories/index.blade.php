@extends('layouts.master')

@section('page-name')
Category list
<small>Display all categories</small>
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
	<span>Taxa categories</span>
</li>
@stop

@section('content')	
<!-- BEGIN PORTLET-->
<div class="portlet light">
		<div class="table-responsive">
		<table class="table table-hover">
			<thead>
				<tr>
					<th>ID</th>
					<th>Name</th>
					<th>Parent category</th>
					<th>Created by</th>
				</tr>
			</thead>
			<tbody>
			@foreach ($categories as $category)
				<tr>
					<th scope="row">
						<a href="{{ url('categories/'.$category->id) }}">
							<div>
								<strong>{{ $category->id }}</strong>
							</div>
						</a>
					</th>
					<td>
						<a href="{{ url('categories/'.$category->id) }}">
							<div>
								{{ $category->name }}
							</div>
						</a>
					</td>
					<td>
						<a href="{{ url('categories/'.$category->id) }}">
							<div>
								{{ $category->father_category['name'] }}
							</div>
						</a>
					</td>					
					<td>
						<a href="{{ url('categories/'.$category->id) }}">
							<div>
								{{ $category->created_by }}
							</div>
						</a>
					</td>					
				</tr>
			@endforeach
			</tbody>
		</table>
		
		<div class="paginator">
			{!! str_replace('/?', '?', $categories->render()) !!}
		</div>
	</div>
</div>
<!-- END PORTLET-->                           
@stop
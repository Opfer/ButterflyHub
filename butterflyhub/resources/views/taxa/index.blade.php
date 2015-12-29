@extends('layouts.master')

@section('page-name')
Taxa list
<small>Display all taxa</small>
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
	<span>Taxa list</span>
</li>
@stop

@section('actions')
<li>
	<a href="#">
		<i class="fa fa-plus-square-o"></i> Add new taxon
	</a>
</li>
<li>
	<a href="#">
		<i class="fa fa-search"></i> Search
	</a>
</li>
@stop

@section('content')	
<!-- BEGIN PORTLET-->
<div class="portlet light">
	<div class="table-responsive">
		<table class="table table-hover">
			<thead>
				<tr>
					<th class="sortable"><a href="{{ url('taxa/sort/id?order='.$order['id']) }}"><div>ID <i class="fa fa-sort"></i></div></a></th>
					<th class="sortable"><a href="{{ url('taxa/sort/taxon_sort?order='.$order['taxon_sort']) }}"><div>Taxon Sort <i class="fa fa-sort"></i></div></a></th>
					<th class="sortable"><a href="{{ url('taxa/sort/name?order='.$order['name']) }}"><div>Name <i class="fa fa-sort"></i></div></a></th>
					<th class="sortable"><a href="{{ url('taxa/sort/english_name?order='.$order['english_name']) }}"><div>English Name <i class="fa fa-sort"></i></div></a></th>
					<th class=""><div>Category</div></th>
					<th class=""><div>Parent</div></th>
				</tr>
			</thead>
			
			<tbody>
			@foreach ($taxa as $taxon)
				<tr>
					<th scope="row">
						<a href="{{ url('taxa/'.$taxon->id) }}">
							<div>
								<strong>{{ $taxon->id }}</strong>
							</div>
						</a>
					</th>
					<td>
						<a href="{{ url('taxa/'.$taxon->id) }}">
							<div>
								{{ $taxon->taxon_sort }}
							</div>
						</a>
					</td>
					<td>
						<a href="{{ url('taxa/'.$taxon->id) }}">
							<div>
								{{ $taxon->name }}
							</div>
						</a>
					</td>
					<td>
						<a href="{{ url('taxa/'.$taxon->id) }}">
							<div>
								{{ $taxon->english_name }}
							</div>
						</a>
					</td>
					<td>
						<a href="{{ url('categories/'.$taxon->category['id']) }}">
							<div>
								{{ $taxon->category['name'] }}
							</div>
						</a>
					</td>
					<td>
						<a href="{{ url('taxa/'.$taxon->father_taxon['id']) }}">
							<div>
								{{ $taxon->father_taxon['name'] }}
							</div>
						</a>
					</td>
				</tr>
			@endforeach
			</tbody>
		</table>
		
		<div class="paginator">
			{!! str_replace('/?', '?', $taxa->render()) !!}
		</div>
	</div>
	
</div>
<!-- END PORTLET-->                           
@stop
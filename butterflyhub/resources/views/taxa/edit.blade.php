@extends('layouts.master')

@section('page-name') Edit taxon<small> {{ $taxon->name }}</small> @stop

@section('taxa-active') active open @stop

@section('taxa-arrow-open') open @stop

@section('sm-taxalist-open') active open @stop

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
	<span>Edit taxalist</span>
</li>
@stop

@section('content')	
<!-- BEGIN PORTLET-->
<div class="portlet light">
	<div class="detail">
		<div class="register-detail">
			<h3 class="taxonomy-title title-1">{!!  $taxonomy !!}</h3>
			{!! Form::model($taxon, [
				'method' => 'PATCH',
				'route' => ['taxa.update', $taxon->id]
			]) !!}
			<div class="row">
				<div class="col-md-6">
					<div class="form-horizontal">
						<div class="form-group">
							<label for="name" class="col-sm-4 control-label">Name</label>
							<div class="col-sm-8">
								{!! Form::text('name', null, ['class' => 'form-control', 'id' => 'name']) !!}
							</div>
						</div>						
					</div>
				</div>
				<div class="col-md-6">				
					<div class="form-horizontal">
						<div class="form-group">
							<label for="name" class="col-sm-4 control-label">English name</label>
							<div class="col-sm-8">
								{!! Form::text('english_name', null, ['class' => 'form-control', 'id' => 'english_name']) !!}
							</div>
						</div>					
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-md-6">
					<div class="form-horizontal">
						<div class="form-group">
							<label for="name" class="col-sm-4 control-label">Taxon sort</label>
							<div class="col-sm-8">
								{!! Form::number('taxon_sort', null, ['class' => 'form-control', 'id' => 'taxon_sort', 'min' => 1, 'max' => $count-1]) !!}
							</div>
						</div>						
					</div>
				</div>
			</div>			
			<!--Taxon order table-->
			<div id="orderTable" class="row">
				<div class="col-md-12">
					<table class="table table-hover">
						<thead>
							<tr>
								<th>Taxon Sort</th>
								<th>ID</th>
								<th>Name</th>
								<th>English Name</th>
								<th>Category</th>
								<th>Parent</th>
							</tr>
						</thead>
						<tbody id="tbody">
							<tr>
								<th scope="row">
									<strong></strong>
								</th>
								<td>
								</td>
								<td>
								</td>
								<td>
								</td>
								<td>
								</td>
								<td>
								</td>
							</tr>
						</tbody>
					</table>
				</div>
			</div>
			<!--End Taxon order table-->
			<h4 class="taxonomy-title title-2">Category</h4>
			<div class="row">
				<div class="col-md-6">
					<div class="form-horizontal">
						<div class="form-group">
							<label for="newCategoryId" class="col-sm-4 control-label">New category</label>
							<div class="col-sm-8">
								{!! Form::select('newtaxoncategory', $newCategoriesOptions, $taxon->category['id'], ['class' => 'form-control', 'id' => 'newCategoryId']) !!}
							</div>
						</div>					
					</div>
				</div>
				<div class="col-md-6">
					<div class="form-horizontal">
						<div class="form-group">
							<label for="taxoncategory" class="col-sm-4 control-label">Current category</label>
							<div class="col-sm-8">
								<input type="text" class="form-control" id="taxoncategory" value="{{ $taxon->category['name'] }}" readonly/>
							</div>
						</div>					
					</div>
				</div>				
			</div>
			<h4 class="taxonomy-title title-2">Father</h4>
			<div class="row">
				<div class="col-md-12">
					<div class="form-horizontal">
						<div class="form-group">
							<label for="newfather" class="col-sm-2 control-label">New Father</label>
							<div class="col-sm-10">
								<input id="newfather" type="text" class="form-control" value="{{ $newFatherTaxon->name or ''}}"/>
								<label id="newfatherformat" type="text" class="form-control taxonomy-title"></label>
								{!! Form::hidden('newfatherid', '', array('id' => 'newFatherTaxonId')) !!}
							</div>
						</div>					
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-md-12">
					<div class="form-horizontal">
						<div class="form-group">
							<label for="father" class="col-sm-2 control-label">Current Father</label>
							<div class="col-sm-10">
								<label type="text" class="form-control taxonomy-title disabled" id="father">{!! $fatherTaxonomy !!}</label>
							</div>
						</div>
					</div>
				</div>
			</div>				
			<br/>
			<div class="row">
				<div class="col-md-12">
					<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#update">Update Taxon</button>
					
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
									{!! Form::submit('Acept', ['class' => 'btn btn-warning']) !!}
									<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
								</div>
							</div>
						</div>
					</div>						
					<a href="{{ url('taxa/'.$taxon->id) }}" class="btn btn-info">Back</a>						
					<div class="pull-right">						
						<button type="button" class="btn btn-default" data-toggle="modal" data-target="#delete">Delete</button>
					</div>
				</div>
			</div>	
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
<script src="{{ url('/') }}/js/jquery-ui.js" type="text/javascript"></script>
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
<script>
$(function() {
	$("#newfather").hide();
	$("#newfatherformat").click(function(){
		$("#newfatherformat").hide();
		$("#newfather").show().focus();
	});
	
	$("#newfather").focusout(function() {
		$("#newfather").hide();
		$("#newfatherformat").show();
	});
	
	$("#newfather").change(function() {
		$("#newfatherformat").empty();
		$("#newFatherTaxonId").val("");
	});
	
	$("#newfather").autocomplete({	
		source: function (request, response) {
			var $newCatID = $('#newCategoryId').children(":selected").attr("value");
			$.ajax({
				url: "{{ url('getTaxonEditAutocomplete') }}",
				dataType: 'JSON',
				type: "GET",
				data: {
					term: request.term,
					newCatID: $newCatID
				},
				beforeSend: function (xhr) {
					var token = $('meta[name="csrf_token"]').attr('content');
					if (token) {
						  return xhr.setRequestHeader('X-CSRF-TOKEN', token);
					}
				},
				success: function (data) {
					response(data);
				},
				error: function (jqXHR, textStatus, errorThrown) {
					alert(textStatus);
					alert(errorThrown);
				},
				messages: {
					noResults: '',
					results: function() {}
				}
			});
		},
		minLength: 3,
		select: function(event, ui){
			event.preventDefault();
			$("#newFatherTaxonId").val(ui.item.id);
			$("#newfather").val(ui.item.name).hide();
			$("#newfatherformat").html(ui.item.desc);
		}
	});
});
</script>
<script>
$(function() {	
	$("#orderTable").hide();
	$("#taxon_sort").focus(function() {
		findOrder();
		$("#orderTable").slideDown("slow", function() {});
	});
	$("#taxon_sort").change(function() {			
		findOrder();
	});
	$("#taxon_sort").keyup(function() {			
		findOrder();
	});
	
	
	function findOrder(){
		var $taxonSortNumber = $('#taxon_sort').val();
		var $taxonID = {!! $taxon->id !!};
		
		if ($taxonSortNumber.length != 0) {
			$.ajax({
				url: "{{ url('getTaxonEditOrder') }}",
				dataType: 'JSON',
				type: "GET",
				data: {
					taxonSortNumber: $taxonSortNumber,
					taxonID: $taxonID
				},
				beforeSend: function (xhr) {
					var token = $('meta[name="csrf_token"]').attr('content');
					if (token) {
						  return xhr.setRequestHeader('X-CSRF-TOKEN', token);
					}
				},			
				success: function (data) {
					var trHTML = '';
					var $taxonTarget = '';
					$.each(data, function (i, item) {
						if({!!$taxon->id!!} == item.id){
							$taxonTarget = 'class="taxonTarget"';
						}else{
							$taxonTarget = '';
						}
						trHTML += '<tr ' + $taxonTarget + '><th scope="row"><strong>' + item.taxon_sort + '</strong></th><td>' + item.id + '</td><<td>' + item.name + '</td><td>' + item.english_name + '<td>' + item.category + '</td><td>' + item.father_taxon + '</td></tr>';
					});
					$('#tbody').empty();
					$('#tbody').append(trHTML);
				},
				error: function (jqXHR, textStatus, errorThrown) {
					//alert(textStatus);
					//alert(errorThrown);
				}
			});	
			$("#orderTable").slideDown("fast", function() {});
		}
	}
});
</script>
@stop
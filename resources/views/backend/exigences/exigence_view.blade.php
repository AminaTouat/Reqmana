@extends('admin.admin_master')
@section('admin')


 <div class="content-wrapper">
	  <div class="container-full">
		<!-- Content Header (Page header) -->


		<!-- Main content -->
		<section class="content">
		  <div class="row">



			<div class="col-12">

			 <div class="box">
				<div class="box-header with-border">
				  <h3 class="box-title">List des Exigences </h3>
	<a href="" style="float: right;" class="btn btn-rounded btn-success mb-5" data-toggle="modal" data-target="#exampleModal"> Ajouter  Exigence</a>

				</div>
				<!-- /.box-header -->
				<div class="box-body">
					<div class="table-responsive">
					  <table id="example1" class="table table-bordered table-striped">
						<thead>
			<tr>
				<th width="5%">Tag</th>
				<th>Type d'exigence</th>
				<th>Importance</th>
				<th>Statut</th>
				<th>discription</th>
				<th>Attribue par</th>
                <th width="25%">Action</th>
			</tr>
		</thead>
		<tbody>
			@foreach($exigences as $key => $exigence  )
			<tr>
				<td>{{ $key+1 }}</td>
				<td> {{ $exigence->Type_exigence }}</td>
				<td> {{ $exigence->Importance }}</td>
				<td> {{ $exigence->statut }}</td>
				<td> {{ $exigence->discription }}</td>
				<td> {{$exigence->name}}</td>
                <td>
<a href="" class="btn btn-info">Edit</a>
<a target="_blank" href="" class="btn btn-danger">Details</a>

				</td>

			</tr>
			@endforeach

						</tbody>
						<tfoot>

						</tfoot>
					  </table>
					</div>
				</div>
				<!-- /.box-body -->
			  </div>
			  <!-- /.box -->


			</div>
			<!-- /.col -->
		  </div>
		  <!-- /.row -->
		</section>
		<!-- /.content -->

	  </div>
  </div>
  <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
	  <div class="modal-content">
		<div class="modal-header">
		  <h5 class="modal-title" id="exampleModalLabel">Ajouter une exigence</h5>
		  {{-- <button type="button" class="close" data-dismiss="modal" aria-label="Close">
			<span aria-hidden="true">&times;</span>
		  </button> --}}
		</div>
		<div class="modal-body">
		 exigence fonctionnelle
		</div>
		<div class="modal-footer">
		  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
		  <button type="button" class="btn btn-primary">Save changes</button>
		</div>
	  </div>
	</div>
  </div>




@endsection

@extends('projects.current_project')
@section('projects')


 <div class="content-wrapper">
	  <div class="container-full">
		<!-- Content Header (Page header) -->
		 

		<!-- Main content -->
		<section class="content">
		  <div class="row">
			  
			 

			<div class="col-12">

			 <div class="box">
				<div class="box-header with-border">
				  <h3 class="box-title">List of stakeholders </h3>
	<a href="{{ route('users.exist.add',$projet->id) }}" style="float: right;" class="btn btn-rounded btn-success mb-5"> Add stakeholders </a>			  

				</div>
				<!-- /.box-header -->
				<div class="box-body">
					<div  class="table-responsive">
					  <table id="example1" class="table table-bordered table-striped">
						<thead>
			<tr>
				<th width="5%">SL</th>
				<th>Rôle</th>
				<th>name</th>
				<th>E-mail</th>
				<th width="25%">Invitation</th>
				@if($resultat->role == 'chef_projet')
				<th width="25%"></th>
				 @endif
			</tr>
		</thead>
		<tbody>
			@foreach($allData as $key => $user )
			<tr>
				<td>{{ $key+1 }}</td>
				<td> {{ $user->role }}</td>
				<td>{{ $user->name }}</td>
				<td>{{ $user->email }}</td>
				@if($user->role != "chef_projet" && ($user->inv =='0'))
				<td>
					<i data-feather="user-plus"></i>
				</td>
				@elseif($user->role != "chef_projet" && ($user->inv =='1'))
				<td>
					<i data-feather="user-check"></i>Accepted
				</td>
				@elseif($user->role != "chef_projet" && ($user->inv =='-1'))
				<td>
					<i data-feather="user-x"></i>Refused
				</td>
				@else 
				<td></td>
				@endif
				@if($resultat->role == 'chef_projet')
				<td>
{{-- <a href="{{ route('users.edit',[$user->id , $projet->id]) }}" class="btn btn-info">Edit</a> --}}
<a href="{{ route('users.delete',[$user->id , $projet->id]) }}" class="btn btn-danger" id="delete">remove</a>


				</td>
				 @endif
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





@endsection

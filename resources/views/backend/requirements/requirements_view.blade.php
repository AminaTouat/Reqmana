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
					<nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                          <li class="breadcrumb-item"><a href="{{ route('project.new') }}">{{$projet->title}}</a></li>
                          <li class="breadcrumb-item active" aria-current="page"> Use case</li>
                          <li class="breadcrumb-item active" aria-current="page"> user requirements</li>
                        </ol>
                      </nav>
					   <h5 class="box-title"><i class="fa fa-fw fa-user"></i> User requirements </h5>
				  @if($resultat->role == 'chef_projet' ||$resultat->role == 'stakeholders')
	<a  style="float: right;" class="btn btn-rounded btn-success mb-5" href="{{ route('requirements.add',$projet->id) }}"> Add</a>
                   @endif
				</div>
				<!-- /.box-header -->
				<div class="box-body">
					<div class="table-responsive">
					  <table id="example1"  class="table table-fit" >
					
						<thead>
			<tr >
				<th></th>
				<th width="5%">Tag</th>
				<th >Summary</th>
				<th >Requirement Type</th>
				<th >Importance</th>
				<th >EntredBy</th>
				<th >Author</th>
				<th>Has A non functional Req </th>

				{{-- <th >Date Entered</th> --}}
				@if($resultat->role == 'chef_projet' ||$resultat->role == 'stakeholders')
                <th >Action</th>
				@endif
			</tr>
		</thead>
		<tbody>
			@foreach($exigences as $key => $exigence  )
			<tr @if($exigence->requirementType == "functional") style="background-color: rgba(0, 0, 0, 0.05);"@else style="background-color:white !important;" @endif >
				<td>
					<input type="hidden" name="" value="">
					<input type="checkbox" name="" id="" value="" checked style="transform: scale(1.5); margin-left: 10px;"> 
					<label for={{$key}}> 
						</label> 
				</td> 
				<td>{{ $key+1 }}</td>
				<td >
					
					<a href="{{ route('requirements.detail',$exigence->id) }}"  title={{$exigence->summary}} >{{substr($exigence->summary,0,20)}}</a>
					
				
				</td>
				<td> {{ $exigence->requirementType }}</td>
				<td  @if($exigence->importance == "should") style="background-color: crimson;color: azure;" @elseif($exigence->importance == "must") style="background-color: goldenrod; color: azure;"  @elseif($exigence->importance == "may") style="background-color: seagreen; color: azure;"  @endif>  {{ $exigence->importance }}</td>
				<td> {{ $exigence->entredBy }}</td>
				<td> {{ $exigence->source }}</td>
				<td>non </td>
				{{-- <td> {{ $exigence->created_at }}</td> --}}
				@if($resultat->role == 'chef_projet' ||$resultat->role == 'stakeholders')
                <td  style="width:1px; white-space:nowrap;" >
					
<a href="{{ route('requirements.edit',$exigence->id) }}" class="btn btn-info">Edit</a>
<a href="{{ route('requirements.delete',$exigence->id ) }}" class="btn btn-danger">remove</a>

				</td>
			
				@endif
			</tr>
			@endforeach

						</tbody>
						{{-- <tfoot>

						</tfoot> --}}
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

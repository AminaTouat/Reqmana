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
				
				<!-- /.box-header -->
                <div class="box-header with-border">
                    <a href="{{ route('requirements.view',$projet->id) }}"><i data-feather="arrow-left" style="size: 60px" ></i></a>
                </div>
				<div class="box-body">
					<div class="table-responsive">
					  <table id="example1"  class="table table-fit" >
					
						<thead>
			<tr >
				<th width="5%">Tag</th>
				<th >Summary</th>
				<th >Requirement Type</th>
				<th >status</th>
			</tr>
		</thead>
		<tbody>
			@foreach($exigences as $key => $exigence  )
			<tr @if($exigence->exigence->requirementType == "functional") style="background-color: rgba(0, 0, 0, 0.05);"@else style="background-color:white !important;" @endif >
					
				<td>{{ $key+1 }}</td>
				<td >
					
					<a href="{{ route('requirements.detail',$exigence->exigence_id) }}"  title={{$exigence->exigence->summary}} >{{substr($exigence->exigence->summary,0,20)}}</a>
					
				
				</td>
				<td> {{ $exigence->exigence->requirementType }}</td>
				@if($exigence->exigence->status == "Implemented")
				<td style="width:1px; white-space:nowrap;" ><i data-feather="check" style="color :rgb(20, 220, 87)"></i>{{ $exigence->exigence->status }}</td>
					@else
				<td style="width:1px; white-space:nowrap;"><i data-feather="file-text" style="color :rgb(20, 220, 87)"></i>{{ $exigence->exigence->status }}</td>
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

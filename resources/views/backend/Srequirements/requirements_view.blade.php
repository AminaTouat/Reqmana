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
                          <li class="breadcrumb-item active" aria-current="page"> software requirements</li>
                        </ol>
                      </nav>
					   <h5 class="box-title"><i class="fa fa-fw fa-user"></i> software requirements </h5>
				  @if($resultat->role == 'chef_projet' ||$resultat->role == 'stakeholders')
	<a  style="float: right;" class="btn btn-rounded btn-success mb-5" href="{{ route('Srequirements.add',$projet->id) }}"> Add</a>
                   @endif
				</div>
				<!-- /.box-header -->
				<div class="box-body">
					<div class="table-responsive">
					  <table id="example1"  class="table table-fit" >
					
						<thead>
			<tr >
				@if($resultat->role == 'chef_projet')
				<th></th>
				@endif
				<th width="5%">Tag</th>
				<th >Summary</th>
				<th >Requirement Type</th>
				<th >Importance</th>
				<th >status</th>
				
				@if($resultat->role == 'chef_projet' ||$resultat->role == 'stakeholders')
                <th >Action</th>
				@endif
			</tr>
		</thead>
		<tbody>
			@foreach($exigences as $key => $exigence  )
			<tr @if($exigence->requirementType == "functional") style="background-color: rgba(0, 0, 0, 0.05);"@else style="background-color:white !important;" @endif >
					@if($resultat->role == 'chef_projet')
				<td>

						<div class="form-check">
							{{-- <input type="hidden" name="valide" value="0" id="valide"> --}}
							<input class="form-check-input" name="valide[]" type="checkbox" onclick="change({{$exigence->id}});" value="{{$exigence->valide}}" id="valide{{$exigence->id}}" 
							@if($exigence->valide !=0)checked @endif >
							<label class="form-check-label" for="valide{{$exigence->id}}">
							</label>
						</div>
				</td> 
				@endif
			
				<td>SR{{ $key+1 }}</td>
				<td >
					
					<a href="{{ route('Srequirements.detail',$exigence->id) }}"  title={{$exigence->summary}} >{{$exigence->summary}}</a>
					
				
				</td>
				<td> {{ $exigence->requirementType }}</td>
				<td  @if($exigence->importance == "should") style="background-color: crimson;color: azure;" @elseif($exigence->importance == "must") style="background-color: goldenrod; color: azure;"  @elseif($exigence->importance == "may") style="background-color: seagreen; color: azure;"  @endif>  {{ $exigence->importance }}</td>
				@if($exigence->status == "Implemented")
				<td style="width:1px; white-space:nowrap;" ><i data-feather="check" style="color :rgb(20, 220, 87)"></i>{{ $exigence->status }}</td>
				@elseif($exigence->status == "Draft")
				<td style="width:1px; white-space:nowrap;"><i data-feather="file-text" style="color :rgb(20, 220, 87)"></i>{{ $exigence->status }}</td>
				@else 
				<td style="width:1px; white-space:nowrap;"><i data-feather="flag" style="color :rgb(20, 220, 87) ;"></i>{{ $exigence->status }}</td>
				@endif
				
				@if(($resultat->role == 'chef_projet') ||($resultat->role == 'stakeholders' && ($exigence->entredBy==Auth::user()->name) ))
                <td  style="width:1px; white-space:nowrap;" >
					
<a href="{{ route('Srequirements.edit',$exigence->id) }}" class="btn btn-info">Edit</a>
<a href="{{ route('Srequirements.delete',$exigence->id ) }}" class="btn btn-danger">remove</a>

				</td>
				@elseif($resultat->role == 'stakeholders')
				<td></td>
			
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
  <script type="text/javascript">
	function change(id){
	var valide = $('#valide'+id).val();
	var url = "{{ route('Srequirements.valide', ":id") }}";
        url = url.replace(':id', id);
	  //alert(valide);          
	  if(valide==1){
	       valide =0;
        }
        else {
	valide =1;
     }
	  $.ajax({
			  type:'POST',
			  url:url,
			  headers: {'X-CSRF-TOKEN': '{{ csrf_token() }}' },
			  data: { "valide" : valide },
			  success: function(data){
				location.reload(true);
			  }
		  });
		};
</script>

@endsection

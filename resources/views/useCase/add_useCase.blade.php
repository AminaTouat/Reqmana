
@extends('projects.current_project')
@section('projects')
{{-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script> --}}

<div class="content-wrapper">
	  <div class="container-full">
		<!-- Content Header (Page header) -->


		<!-- Main content -->
		<section class="content">
            @if (session('error'))
            <div class="alert alert-danger">{{ session('error') }}</div>
            @endif
      
            @if($resultat->role== 'chef_projet' )
            <div class="box">
                <div class="box-header with-border mb-4">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                          <li class="breadcrumb-item"><a href="{{ route('project.new') }}">{{$projet->title}}</a></li>
                          <li class="breadcrumb-item active" aria-current="page"> Use case</li>
                        </ol>
                      </nav>
                    <h5 class="box-title"><i class="fa fa-fw fa-user"></i>Add Use case</h5>

                </div>
                <!-- /.box-header -->
                
                <div class="box-body">
                    <div class="row">
                        <div class="col">

                            <form method="post" action="{{ route('create.useCase',$projet->id) }}" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col-12">
                                            <div class="col-md-4">
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        {{-- <span class="input-group-text" id="basic-addon1">Use case</span> --}}
                                                    <input type="text" placeholder="Enter  title " class="input-group-text" id="basic-addon1" name="title">
                                                    </div>
                                                    <input id="image" type="file" name="image"
                                                           class="form-control"
                                                           value="">
                                                </div>
                                            </div><!-- End Col Md-6 -->
                                            <div class="col-md-2">
                                                <div class="form-group">
                                                    <div class="controls">
                                                        <img id="showImage" class=" mx-auto"
                                                             src="{{ (!empty($use->image))?
              url('upload/use_case/'.$use->image):url('upload/no_image.jpg') }}" alt="User Avatar"
                                                             style="width: 100px; border: 1px solid black;">
                                                    </div>
                                                   
                                             
                                                </div>
                                            </div>
                                        
                                                <div class="col-sm-6">
                                                    <div class="text-xs-right">
                                                        <input type="submit" class="btn btn-rounded btn-info mb-5"
                                                               value="submit">
                                                    </div>
                                                    
                                                </div>
                                         <!-- End Row -->
                                      

                                    </div>
                                    
                                </div>
                            
                            </form>

                        </div>
                        <!-- /.col -->
                    </div>
                    <!-- /.row -->
                </div>
                
                <!-- /.box-body -->
            </div>
            @endif
@if(!$use->isEmpty())
		  <div class="row">



			<div class="col-12">

			 <div class="box">
				
				<!-- /.box-header -->
				<div class="box-body">
					<div class="table-responsive">
					  <table id="example3" class="table  table-striped">
						<thead>
			<tr>
				<th scope="col"></th>
				<th scope="col"></th>
                <th scope="col"></th>
			</tr>
		</thead>
		<tbody>
			@foreach($use as $key => $use  )
			<tr>
                <td width="10%"> {{$use->title}} </td>
                <td width="25%"> 
                    <img id="showImage" class=" mx-auto" onclick="window.open(this.src,'_blank','toolbar=0, location=0, directories=0, status=0, scrollbars=0, resizable=0, copyhistory=0, menuBar=0, width=224, height=224');"
                    src="{{ (!empty($use->image))?
url('upload/use_case/'.$use->image):url('upload/no_image.jpg') }}" alt="User Avatar"
                    style="width: 100px; border: 1px solid rgb(14, 13, 13);">
                    
                    <div id="{{$use->id}}" class="form-group" style="display: none;">
                        <h4>Display Comments</h4>
      
                        @include('useCase.commentsDisplay', [ 'comments' => $use->comments,'use_case_id' => $use->id])
       
                        <hr />
                        <h4>Add comment</h4>
                        <form method="post" action="{{ url('/comment/store'   ) }}">
                            @csrf
                            <div class="form-group">
                                <textarea class="form-control" name="body"></textarea>
                                <input type="hidden" name="use_case_id" value="{{ $use->id }}" />
                            </div>
                            <div class="form-group">
                                <input type="submit" class="btn btn-success" value="Add Comment" />
                            </div>
                        </form>
                    </div>
                   
                </td>
                <td width="25%">
                    @if($resultat->role == 'chef_projet' ||$resultat->role == 'stakeholders')
                    {{-- <a href="" class="btn btn-info">Edit</a> --}}
                    <a href="{{ route('useCase.delete',$use->id ) }}" class="btn btn-danger" id="delete">Remove</a>
                    <a  style="float: right;" class="btn btn-rounded btn-success mb-5" href="{{ route('requirementsUse.add',[$projet->id,$use->id]) }}"> Add user Req</a>
                    @endif
                    <a  class="btn btn-warning" value="Masquer" onclick="masquer_div('{{$use->id}}');" >Comment</a>
                    
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
          @endif
      
		  <!-- /.row -->
		</section>
		<!-- /.content -->

	  </div>
  </div>
 
  <script type="text/javascript">
    $(document).ready(function () {
        $('#image').change(function (e) {
            var reader = new FileReader();
            reader.onload = function (e) {
                $('#showImage').attr('src', e.target.result);
            }
            reader.readAsDataURL(e.target.files['0']);
        });
    });

    function masquer_div(id)
{
  if (document.getElementById(id).style.display == 'none')
  {
       document.getElementById(id).style.display = 'block';
  }
  else
  {
       document.getElementById(id).style.display = 'none';
  }
}
</script>




@endsection

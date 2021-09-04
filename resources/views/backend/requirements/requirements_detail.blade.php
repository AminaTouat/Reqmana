@extends('projects.current_project')
@section('projects')


    <div class="content-wrapper">
        <div class="container-full">
            <!-- Content Header (Page header) -->


            <section class="content">

                <!-- Basic Forms -->
                <div class="box">
                    <div class="box-header with-border">
						<a href="{{ route('requirements.view',$projet->id) }}"><i data-feather="arrow-left" style="size: 60px" ></i></a>
                        <h5 class="box-title">{{$editData->summary}}</h5>

                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <div class="row">
                            <div class="col">

                                    <div class="row">
                                        <div class="col-12">
											<div class="row">
												<div class="col-3">
										
													<div class="row">
														<div class="col-7">
                                                        <h6>Requirement type<span class="text-danger">*</span></h6>
													</div>
													<div class="col-5">
                                                        <h6 style="color:black;">{{$editData->requirementType}}</h6>
                                                        
													</div>	
													
												</div>
													<div class="row" style="margin-top: 27px;">
														<div class="col-7">
                                                        <h6>Importance<span class="text-danger">*</span></h6>
													</div>
													<div class="col-5">
                                                        <h6 style="color:black;">{{$editData->importance}}</h6>
                                                 
													</div>	
													
												</div>
													<div class="row" style="margin-top: 27px;">
														<div class="col-7">
                                                        <h6>Entered By</h6>
													</div>
													<div class="col-5">
                                                        <h6 style="color:black;">{{$editData->entredBy}}</h6>
                                                      
													</div>	
													
												</div>
													
												<div class="row" style="margin-top: 27px;">
													<div class="col-7">
													<h6>Author</h6>
												</div>
												<div class="col-5">
                                                    <h6 style="color:black;">{{$editData->source}}</h6>
													
												</div>	
												
											</div>
												<div class="row" style="margin-top: 27px;">
													<div class="col-7">
													<h6>Date Entered</h6>
												</div>
												<div class="col-5">
                                                    <h6 style="color:black;">{{ $editData->created_at }}</h6>
													
												</div>	
												
											</div>
												<div class="row" style="margin-top: 27px;">
													<div class="col-7">
													<h6>Last updated</h6>
												</div>
												<div class="col-5">
                                                    <h6 style="color:black;">{{ $editData->updated_at }}</h6>
													
												</div>	
												
											</div>
                                                    
											</div>
											<div class="col-6">
												<div class="form-group">
													<h6>Description <span class="text-danger">*</span></h6>
													<textarea class="form-control" name="body">{{$editData->body}}</textarea>
													<input type="hidden" name="projet_id" value="{{ $projet->id }}" />
												</div>
											</div>
                                            <div class="col-3">
                                                <div id="{{$editData->id}}" class="form-group" >
                                                    <h4>Display Comments</h4>
                                  
                                                    @include('backend.requirements.commentsDisplay', [ 'comments' => $editData->comments,'exigence_id' => $editData->id])
                                   
                                                    <hr />
                                                    <h4>Add comment</h4>
                                                    <form method="post" action="{{ url('/comment/store'   ) }}">
                                                        @csrf
                                                        <div class="form-group">
                                                            <textarea class="form-control" name="body"></textarea>
                                                            <input type="hidden" name="exigence_id" value="{{ $editData->id }}" />
                                                        </div>
                                                        <div class="form-group">
                                                            <input type="submit" class="btn btn-success" value="Add Comment" />
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
										</div>
                                           <!-- End Row -->
                                

                            </div>
                            <!-- /.col -->
                        </div>
						<div class="text-xs-right">
							<a href="{{ route('requirements.edit',$editData->id) }}" class="btn btn-info">Edit</a>
						</div>
                        <!-- /.row -->
                    </div>
                    <!-- /.box-body -->
                </div>
					</div>
				</div>
                <!-- /.box -->

            </section>


        </div>
    </div>





@endsection

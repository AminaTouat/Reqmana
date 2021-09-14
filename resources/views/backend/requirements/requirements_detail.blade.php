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
                        <nav aria-label="breadcrumb">
							<ol class="breadcrumb">
							  <li class="breadcrumb-item"><a href="{{ route('project.new') }}">{{$projet->title}}</a></li>
							  @if($editData->useCase !=null)
							  <li class="breadcrumb-item active" aria-current="page"> {{ $editData->useCase->title }}</li>
							  @endif
							  <li class="breadcrumb-item active" aria-current="page"> {{$editData->summary}}</li>
							</ol>
						  </nav>
						{{-- <h5 class="box-title">{{$editData->summary}}</h5> --}}

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
											
											@if($editData->useCase !=null)
												<div class="row" style="margin-top: 27px;">
													<div class="col-7">
													<h6>Use case</h6>
												</div>
												<div class="col-5">
                                                    <h6 style="color:black;">{{ $editData->useCase->title }}</h6>
													
												</div>	
												
											</div>
                                                    @endif
											
											
											@if(!empty($req))
												<div class="row" style="margin-top: 27px;">
													<div class="col-7">
													<h6>Software Req</h6>
												</div>
												<div class="col-5">
                                                  
														<div class="dropdown">
															<a  href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
																Software Req...
															  </a>
															  <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
																@foreach($req as $req)
																<a class="dropdown-item" href="{{ route('software.view',[$projet->id ,$req->id]) }}">{{ $req->summary  }}</a>
																@endforeach
															  </div>
														</div>
													
												</div>	
												
											</div>
                                                    @endif
											
                                                    
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
						@if(($resultat->role == 'chef_projet') ||($resultat->role == 'stakeholders' && ($editData->entredBy==Auth::user()->name) ))
						<div class="text-xs-right">
							<a href="{{ route('requirements.edit',$editData->id) }}" class="btn btn-info">Edit</a>
						</div>
						@endif
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

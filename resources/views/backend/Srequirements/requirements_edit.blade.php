@extends('projects.current_project')
@section('projects')


    <div class="content-wrapper">
        <div class="container-full">
            <!-- Content Header (Page header) -->


            <section class="content">
                <form method="post" action="{{ route('Srequirements.update',$editData->id) }}">
                    @csrf
                <!-- Basic Forms -->
                <div class="box">
                    <div class="box-header with-border">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                              <li class="breadcrumb-item"><a href="{{ route('project.new') }}">{{$projet->title}}</a></li>
                              <li class="breadcrumb-item active" aria-current="page"> Use case</li>
                              <li class="breadcrumb-item active" aria-current="page"> software requirements</li>
                            </ol>
                          </nav>
                        <div class="row">
                            <div class="col-6">
                        <h5 class="box-title">Update software Requirement</h5>
                            </div>
                        </div>
                        <div class="row" style="margin-top: 20px;">
                            <div class="col-1">
                                <h6 style="color:rgb(165, 2, 2);">Summary</h6>
                            </div>
                            <div class="col-9">
                                <input  class=" form-control" value="{{$editData->summary}}" type="text" name="summary"  required/>
                          </div>
                        </div>
                         

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
														<div class="col-4">
                                                        <h6>Requirement type<span class="text-danger">*</span></h6>
													</div>
													<div class="col-8">
                                                        <div class="controls">
                                                            <select name="requirementType" id="requirementType" required=""
                                                                    class="form-control">
                                                                <option value="{{$editData->requirementType}}">{{$editData->requirementType}}
                                                                </option>
                                                                <option value="functional">Functional Requirement</option>
                                                                <option value="nonfunctional">Non Functional Requirement</option>

                                                            </select>
                                                        </div>
													</div>	
													
												</div>
													<div class="row" style="margin-top: 27px;">
														<div class="col-4">
                                                        <h6>Importance<span class="text-danger">*</span></h6>
													</div>
													<div class="col-8">
                                                        <div class="controls">
                                                            <select name="importance" id="importance" required=""
                                                                    class="form-control">
                                                                <option value="{{$editData->importance}}" >{{$editData->importance}}
                                                                </option>
                                                                <option value="must">Must</option>
                                                                <option value="should">Should</option>
                                                                <option value="may">May</option>

                                                            </select>
                                                        </div>
													</div>	
													
												</div>
													<div class="row" style="margin-top: 27px;">
														<div class="col-4">
                                                        <h6>Entered By</h6>
													</div>
													<div class="col-8">
                                                        <div class="controls">
                                                            <select name="entredBy" id="entredBy" value="entredBy"
                                                                    class="form-control">
                                                                <option value="{{$editData->entredBy}}" >{{$editData->entredBy}}
                                                                </option>
                                                            </select>
                                                        </div>
													</div>	
													
												</div>
													
												<div class="row" style="margin-top: 27px;">
													<div class="col-4">
													<h6>source</h6>
												</div>
												<div class="col-8">
													<div class="controls">
                                                        <select name="source" id="source" required=""
                                                        class="form-control">
                                                        <option value="{{$editData->source}}" >{{$editData->source}}
                                                        </option>
                                                        @foreach(App\Models\Exigence::get() as $key => $exigence )
                                                        <option value="{{ $exigence->id }}" >{{ $exigence->id}}
                                                        </option>
                                                        @endforeach
                                                

                                                </select>
													</div>
												</div>	
												
											</div>
                                            
											</div>
                                            <div class="col-9">
												<div class="form-group">
													<h6>Description <span class="text-danger">*</span></h6>
													<textarea class="form-control" name="body"autocorrect="true" autocapitalize="true" rows="5" cols="33">{{$editData->body}}</textarea>
													<input type="hidden" name="projet_id" value="{{ $projet->id }}" />
												</div>
												<div class="row" style="margin-top: 27px;">
													<div class="form-group">
													<h6>fit criteria</h6>
													<textarea class="form-control"name="fitC"autocorrect="true" autocapitalize="true" rows="5" cols="33">{{$editData->fitC}}</textarea>
												</div>
											</div>
											</div>
										</div>
                                           <!-- End Row -->
                                

                            </div>
                            <!-- /.col -->
                        </div>
						<div class="row" style="margin-top: 27px;">
                            <div class="text-xs-right">
                                <input type="submit" class="btn btn-rounded btn-info mb-5"
                                       value="save">
                            </div>
                        </div>
					
                        <!-- /.row -->
                    </div>
                    <!-- /.box-body -->
                </div>
					</div>
				</div>
                <!-- /.box -->
            </form>
            </section>


        </div>
    </div>

    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document" style="    max-width: 857px;        ">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Add non fonctional link</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
                <div class="box">
                    <div class="box-header with-border">
                <div class="row">
                    <div class="col-2">
                        <h6>Definition</h6>
                    </div>
                    <div class="col-4">
                        <div class="controls">
                            <select name="requirementType" id="requirementType" required=""
                                    class="form-control">
                                {{-- <option value="functional">Functional Requirement</option> --}}
                                <option value="nonfunctional">Non Functional Requirement</option>

                            </select>
                        </div>
                    </div>	
                    
                </div>
                <div class="row" style="margin-top: 24px;">
                    <div class="col-2">
                        <h6>Comment</h6>
                    </div>
                    <div class="col-10">

                        <input type="text" style="    border-color: #b3c5d9; border: 1px solid #ced4da; width: inherit; " />
                   </div>	
                    
                </div>
            </div>
            <div class="box-body">
                {{-- @foreach($links as $link)
                @endforeach --}}
                <table id="example1"  class="table table-fit" >
                <div class="row">
                    <div class="col-4">
                        <a>Item Type</a>
                    </div>
                    <div class="col-6">
                        <a>Summary</a>
                    </div>
                    <div class="col-2">
                        <a>Relation</a>
                    </div>
                </div>
                <div class="row" style="margin-top: 27px; color:black;">
                    <div class="col-4">
                        <a>{{$editData->requirementType}}</a>
                    </div>
                    <div class="col-6">
                        <a>{{$editData->summary}}</a>
                    </div>
                    <div class="col-2">
                        <a>Parent</a>
                    </div>
                </div>
            </table>
            </div>
                </div>
            </div> 
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              <button type="button" class="btn btn-primary">Save changes</button>
            </div>
          </div>
        </div>
      </div>
    

      
@endsection

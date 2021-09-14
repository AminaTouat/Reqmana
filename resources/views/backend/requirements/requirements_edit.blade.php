@extends('projects.current_project')
@section('projects')


    <div class="content-wrapper">
        <div class="container-full">
            <!-- Content Header (Page header) -->


            <section class="content">
                <form method="post" action="{{ route('requirements.update',$editData->id) }}">
                    @csrf
                <!-- Basic Forms -->
                <div class="box">
                    <div class="box-header with-border">
                        
                        <nav aria-label="breadcrumb">
							<ol class="breadcrumb">
							  <li class="breadcrumb-item"><a href="{{ route('project.new') }}">{{$projet->title}}</a></li>
							  @if($editData->useCase !=null)
							  <li class="breadcrumb-item active" aria-current="page"> {{ $editData->useCase->title }}</li>
							  @endif
							  <li class="breadcrumb-item active" aria-current="page"> {{$editData->summary}}</li>
							</ol>
						  </nav>
                          
                        <div class="row">
                            <div class="col-6">
                        <h5 class="box-title">Update user Requirement</h5>
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
                            <div class="row" style="margin-top: 20px;">
                            <div class="col-6">
                                <div class="dropdown">
                                    <a  href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        Add ...
                                      </a>
                                      <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                        <a class="dropdown-item" href="{{ route('SrequirementsUser.add',[$projet->id,$editData->id]) }}">Software Req</a>
                                        <a class="dropdown-item" href="" data-toggle="modal" data-target="#exampleModal">Non Fonctional Req</a>
                                        
                                      </div>
                                </div>
                        {{-- <a href="" data-toggle="modal" data-target="#exampleModal">
                            Add  ...
                          </a> --}}
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
                                                                {{-- <option value="{{ $projet->user->name }}">{{ $projet->user->name }}</option> --}}
                                                                {{-- <option value="should">Should</option>
                                                                <option value="may">May</option> --}}

                                                            </select>
                                                        </div>
													</div>	
													
												</div>
													
												<div class="row" style="margin-top: 27px;">
													<div class="col-4">
													<h6>Author</h6>
												</div>
												<div class="col-8">
													<div class="controls">
														<select name="source" id="source" required=""
																class="form-control">
															{{-- <option value="{{$editData->source}}" >{{$editData->source}}
															</option> --}}
                                                            @foreach($allData as $key => $user )
															<option value="{{ $user->name }}" >{{ $user->name }}
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
													<textarea class="form-control" name="body" autocorrect="true" autocapitalize="true">{{$editData->body}}</textarea>
													<input type="hidden" name="projet_id" value="{{ $projet->id }}" />
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
 {{-- modal de add non FncReq --}}

    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document" style="    max-width: 857px;        ">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Add non fonctional Req</h5>
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
                {{-- <div class="row" style="margin-top: 24px;">
                    <div class="col-2">
                        <h6>Comment</h6>
                    </div>
                    <div class="col-10">

                        <input type="text" style="    border-color: #b3c5d9; border: 1px solid #ced4da; width: inherit; " />
                   </div>	
                    
                </div> --}}
            </div>
            <div class="row" style="margin-top: 24px;">
                <div class="col-8">
                <a href="" style="margin-left: 24px;" data-toggle="modal" data-target="#itemsModal"> Add additional items </a>
                </div>
                <div class="col-3">
                <a href="" type="submit" value="save" class="btn">Remove</a>
               </div>
        </div>
            <div class="box-body">
                
               
                <table   class="table table-fit" >
                    <thead>
                        <tr >
                            <th></th>
                            <th>Item Type</th>
                            <th>Number</th>
                            <th>Summary</th>
                            <th>Relation</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td></td>
                            <td>{{$editData->requirementType}}</td>
                            <td>{{$editData->id}}</td>
                            <td>{{$editData->summary}}</td>
                            <td><strong>Parent</strong></td>
                        </tr>
                        @foreach($links as $link)
                        <tr>
                            <td>
                            <div class="form-check">
                                {{-- <input type="hidden" name="parent_id[]" value="{{$editData->id}}"  > --}}
                                <input class="form-check-input" name="sup[]" type="checkbox"  value="{{$link->id}}" id="{{$link->id}}" 
                                 >
                                <label class="form-check-label" for="{{$link->id}}">
                                </label>
                            </div>
                        </td>
                            <td><i data-feather="corner-down-right" ></i>{{App\Models\Exigence::find($link->exigence_id)->requirementType}}</td>
                            <td>{{$link->exigence_id}}</td>
                            <td>{{App\Models\Exigence::find($link->exigence_id)->summary}}</td>
                            <td>child</td>
                        </tr>
                        @endforeach
                    </tbody>

                   
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

      {{-- modal items --}}
    
      <div class="modal fade" id="itemsModal" tabindex="-1" role="dialog" aria-labelledby="itemsModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document" style="    max-width: 600px;  ">
            <form method="post" action="{{ route('link.store') }}">
                @csrf
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="itemsModalLabel">non fonctional Req</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
                <div class="box">
                   
            <div class="box-body">
                {{-- @foreach($links as $link)
                @endforeach --}}
                <table id="example1"  class="table table-fit" >
					
                    <thead>
        <tr >
            <th></th>
            <th width="5%">Tag</th>
            <th >Summary</th>
            <th >status</th>
        </tr>
    </thead>
    <tbody>
        @foreach($exigences as $key => $exigence  )
        <tr>
            <td>
                
                    <div class="form-check">
                        <input type="hidden" name="parent_id[]" value="{{$editData->id}}"  >
                        <input class="form-check-input" name="exigence_id[]" type="checkbox"  value="{{$exigence->id}}" id="{{$key}}" 
                         >
                        <label class="form-check-label" for="{{$key}}">
                        </label>
                    </div>
                
            </td> 
            <td>{{ $key+1 }}</td>
            <td >
                
                <a title={{$exigence->summary}} >{{substr($exigence->summary,0,20)}}</a>
            </td>
            <td style="width:1px; white-space:nowrap;" >{{ $exigence->status }}</td>
          
        </tr>
        @endforeach

                    </tbody>
                   
                  </table>
            
            </div>
                </div>
            </div> 
            <div class="modal-footer">
              <input type="submit" class="btn btn-rounded btn-info mb-5"
                                       value="save">
            </div>
          </div>
        </form>
        </div>
      </div>
      
@endsection

@extends('projects.current_project')
@section('projects')


    <div class="content-wrapper">
        <div class="container-full">
            <!-- Content Header (Page header) -->


            <section class="content">
                <form method="post" action="{{ route('requirements.store') }}">
                    @csrf
                <!-- Basic Forms -->
                <div class="box">
                    <div class="box-header with-border">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                              <li class="breadcrumb-item"><a href="{{ route('project.new') }}">{{$projet->title}}</a></li>
                              @if(!empty($id_use ))
							  <li class="breadcrumb-item active" aria-current="page"> {{ App\Models\UseCase::find($id_use)->title}}</li>
							  @endif
                              <li class="breadcrumb-item active" aria-current="page">  add user requirements</li>
                            </ol>
                          </nav>
                        <div class="row">
                            <div class="col-6">
                                <h5 class="box-title">Adding user Requirement</h5>
                            </div>
                        </div>
                            <div class="row" style="margin-top: 20px;">
                            <div class="col-1">
                                <h6>Summary<span class="text-danger">*</span></h6>
                            </div>
                            <div class="col-9">
                                <input  class=" form-control" type="text" name="summary"  required/>
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
                                                            <select name="requirementType" id="requirementType" required
                                                                    class="form-control">
                                                                <option value="requirementType" selected="" disabled="">not set
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
                                                                <option value="importance" selected="" disabled="">not set
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
                                                                <option value="{{ $projet->users()->find(Auth::user())->name }}" >{{ $projet->users()->find(Auth::user())->name }} ({{ $resultat->role }})
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
													<textarea class="form-control" name="body" required></textarea>
													<input type="hidden" name="projet_id" value="{{ $projet->id }}" />
                                                    @if(!empty($id_use))
													<input type="hidden" name="id_use" value="{{ $id_use }}" />
                                                    @endif
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
            </form>
                <!-- /.box -->

            </section>


        </div>
    </div>


  

@endsection

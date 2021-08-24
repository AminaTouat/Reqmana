@extends('projects.current_project')
@section('projects')


    <div class="content-wrapper">
        <div class="container-full">
            <!-- Content Header (Page header) -->


            <section class="content">

                <!-- Basic Forms -->
                <div class="box">
                    <div class="box-header with-border">
                        <h5 class="box-title">Add stakeholders</h5>

                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <div class="row">
                            <div class="col">

                                <form method="post" action="{{ route('users.store',$projet->id) }}">
                                    @csrf
                                    <div class="row">
                                        <div class="col-12">


                                            <div class="row">
                                                <div class="col-md-6">

                                                    <div class="form-group">
                                                        <h5>Role  <span class="text-danger">*</span></h5>
                                                        <div class="controls">
                                                            <select name="role" id="role" required=""
                                                                    class="form-control">
                                                                <option value="role" selected="" disabled="">Select role
                                                                </option>
                                                                <option value="stakeholders">stakeholders</option>
                                                                <option value="customer">customer</option>

                                                            </select>
                                                        </div>
                                                    </div>
                                                </div> <!-- End Col Md-6 -->

                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <h5>Name <span class="text-danger">*</span></h5>
                                                        <div class="controls">
                                                            <input type="text" name="name" class="form-control"
                                                                   required=""></div>

                                                    </div>

                                                </div><!-- End Col Md-6 -->


                                            </div> <!-- End Row -->


                                            <div class="row">
                                                <div class="col-md-6">

                                                    <div class="form-group">
                                                        <h5>E-mail <span class="text-danger">*</span></h5>
                                                        <div class="controls">
                                                            <input type="email" name="email" class="form-control"
                                                                   required=""></div>
                                                                   <input type="hidden" name="projet_id" value="{{ $projet->id }}" />

                                                    </div>

                                                </div> <!-- End Col Md-6 -->
                                                <div class="form-group">
                                                    <h5>password <span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <input type="name" name="password" class="form-control"
                                                               required=""></div>
                                                </div>
                                                <div class="col-md-6">

                                                </div><!-- End Col Md-6 -->


                                            </div> <!-- End Row -->


                                            <div class="text-xs-right">
                                                <input type="submit" class="btn btn-rounded btn-info mb-5"
                                                       value="Submit">
                                            </div>
                                </form>

                            </div>
                            <!-- /.col -->
                        </div>
                        <!-- /.row -->
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->

            </section>


        </div>
    </div>





@endsection

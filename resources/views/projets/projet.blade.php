@extends('user.user_master')
@section('user')


    <div class="content-wrapper">
        <div class="container-full">
            <!-- Content Header (Page header) -->


            <section class="content">

                <!-- Basic Forms -->
                <div class="box">
                    <div class="box-header with-border">
                        <h4 class="box-title">Add Project</h4>

                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <div class="row">
                            <div class="col">

                                <form method="Post" action="{{ route('createProjet') }}" >
                                    @csrf
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="col-6">
                                                <div class="form-group">
                                                    <h5>Titre de projet <span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <input type="text" name="title" class="form-control" >
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="form-group">
                                                    <h5>Description <span class="text-danger">*</span></h5>
                                                    <textarea name="content" class="form-control" rows="10">

                                                    </textarea>
                                                </div>
                                            </div>
                                            <div class="text-xs-right">
                                                <input type="submit" class="btn btn-rounded btn-info mb-5" value="Enregistrer">
                                            </div>
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
                <!-- /.box -->

            </section>

        </div>
    </div>

@endsection

@extends('backend.user.user_master')
@section('user')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>


    <div class="content-wrapper">
        <div class="container-full">
            <!-- Content Header (Page header) -->


            <section class="content">

                <!-- Basic Forms -->
                <div class="box">
                    <div class="box-header with-border mb-4">
                        <h4 class="box-title"><i class="fa fa-fw fa-user"></i> Manage profile</h4>

                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <div class="row">
                            <div class="col">

                                <form method="post" action="{{ route('profile.store') }}" enctype="multipart/form-data">
                                    @csrf
                                    <div class="row">

                                        <div class="col-12">


                                            <div class="row mb-4">
                                                <div class="col-md-6 mb-4">
                                                    <div class="input-group mb-3">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text" id="basic-addon1">Name</span>
                                                        </div>
                                                        <input type="text" name="name" class="form-control"
                                                               value="{{ $editData->name }}" required="">
                                                    </div>
                                                </div> <!-- End Col Md-6 -->

                                                <div class="col-md-6 mb-4">
                                                    <div class="input-group mb-3">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text" id="basic-addon1">E-mail</span>
                                                        </div>
                                                        <input type="email" name="email" class="form-control"
                                                               value="{{ $editData->email }}" required="">
                                                    </div>
                                                </div><!-- End Col Md-6 -->


                                            </div> <!-- End Row -->


                                            <div class="row mb-4">
                                                <div class="col-md-6 mb-4">
                                                    <div class="input-group mb-3">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text" id="basic-addon1">phone number</span>
                                                        </div>
                                                        <input type="text" name="mobile" class="form-control"
                                                               value="{{ $editData->mobile }}" required="">
                                                    </div>
                                                </div> <!-- End Col Md-6 -->

                                                <div class="col-md-6 mb-4">
                                                    <div class="input-group mb-3">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text" id="basic-addon1">Adress</span>
                                                        </div>
                                                        <input type="text" name="address" class="form-control"
                                                               value="{{ $editData->address }}" required="">
                                                    </div>

                                                </div><!-- End Col Md-6 -->


                                            </div> <!-- End Row -->


                                            <div class="row mb-2">
                                                <div class="col-md-6">
                                                    <div class="input-group">
                                                        <div class="input-group-prepend">
                                                            <label class="input-group-text" for="inputGroupSelect01">Sexe</label>
                                                        </div>
                                                        <select class="custom-select" name="gender" id="gender">
                                                            <option selected disabled>Select sexe...</option>
                                                            <option value="Male" {{ ($editData->gender == "Male" ? "selected": "") }} >Homme</option>
                                                            <option value="Female" {{ ($editData->gender == "Female" ? "selected": "") }} >Femme</option>
                                                        </select>
                                                    </div>
                                                </div> <!-- End Col Md-6 -->

                                                <div class="col-md-4">
                                                    <div class="input-group">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text" id="basic-addon1">Profile Photo</span>
                                                        </div>
                                                        <input id="image" type="file" name="image"
                                                               class="form-control"
                                                               value="{{ $editData->name }}">
                                                    </div>
                                                </div><!-- End Col Md-6 -->
                                                <div class="col-md-2">
                                                    <div class="form-group">
                                                        <div class="controls">
                                                            <img id="showImage" class=" mx-auto"
                                                                 src="{{ (!empty($user->image))?
                  url('upload/user_images/'.$user->image):url('upload/no_image.jpg') }}" alt="User Avatar"
                                                                 style="width: 100px; border: 1px solid black;">
                                                        </div>
                                                    </div>
                                                </div>
                                                    <div class="col-sm-6">
                                                        <div class="text-xs-right">
                                                            <input type="submit" class="btn btn-rounded btn-info mb-5"
                                                                   value="Update">
                                                        </div>
                                                    </div>
                                            </div> <!-- End Row -->

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
    </script>


@endsection

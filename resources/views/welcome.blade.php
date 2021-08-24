
@extends('layouts.master')

@section('title')Welcome to the best e-learning platform @endsection

@section('content')
    <header class="masthead" style="background-size: cover; background-position: center; background-attachment: fixed; min-height: 100vh; background-image: url({{asset('backend/images/background.jpg')}})">
        <div class="overlay"></div>
        <div class="container p-5">

            <div class="row">
                <div class="col-lg-8 col-md-10 mx-auto">
                    <div class="site-heading mb-4">
                        <h2><span class="text-uppercase"><b>you have a vision</b></span><br></h2>
                        <p class="lead d-none d-sm-block text-uppercase">we have a way to get you there</p>
                        <p class="lead"><a class="btn btn-lg  btn-bold btn-outline-info" >Get Started</a></p>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <!-- Main Content -->
   
@endsection

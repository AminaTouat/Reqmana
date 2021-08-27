
@extends('backend.user.user_master')
@section('user')
<div class="content-wrapper">
    <div class="container-full">
      <!-- Content Header (Page header) -->


      <!-- Main content -->
      <section class="content">
        <div class="box">
            <div class="box-header with-border mb-4">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                      <li class="breadcrumb-item"><a href="{{ route('project.new') }}">Acctivity</a></li>
                      <li class="breadcrumb-item active" aria-current="page"> Invitations</li>
                    </ol>
                  </nav>
                <h5 class="box-title"><i class="fa fa-fw fa-user"></i>Invitations</h5>

            </div>
            <!-- /.box-header -->
            
            <div class="box-body">
                <div class="table-responsive">
                    <table   class="table table-fit" >
                        <tbody>
                            @foreach($resultats as $resultat)
                            <tr>
                               
                                <td>
                                    <strong>{{$resultat->title}}</strong>
                                </td>
                               
                                <td>
                                    <a href="{{ route('users.accept',$resultat->id)}}" class="btn btn-info">Accept</a>
                                    <a href="{{ route('users.refuse',$resultat->id)}}" class="btn btn-danger">refuse</a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <!-- /.row -->
            </div>
            
            <!-- /.box-body -->
        </div>
      </section>
    </div>

</div>
@endsection
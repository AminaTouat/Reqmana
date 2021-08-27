@extends('projects.current_project')
@section('projects')

{{-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script> --}}

<script src="https://cdnjs.cloudflare.com/ajax/libs/handlebars.js/4.7.6/handlebars.min.js"></script>

 <div class="content-wrapper">
	  <div class="container-full">
		<!-- Content Header (Page header) -->
		 

		<!-- Main content -->
		<section class="content">
		  <div class="row">

		
<div class="col-12">
<div class="box bb-3 border-warning">
				  <div class="box-header">
					<h4 class="box-title">Add <strong>stakeholders</strong></h4>
				  </div>

				  <div class="box-body">
				
		 
			<div class="row"> 
 
<div class="col-md-6">

 		<div class="form-group">
		<h5> Email <span class="text-danger">*</span></h5>
		<div class="controls">
	 <input type="email" name="email" id="email" class="form-control" > 
	  </div>
		 
	</div>
	  
 			</div> <!-- End Col md 3 --> 

 

 			<div class="col-md-6" style="padding-top: 25px;" >

  <a id="search" class="btn btn-primary" name="search"> Search</a>
	  
 			</div> <!-- End Col md 3 --> 		
			</div><!--  end row --> 


 <!--  ////////////////// Mark Entry table /////////////  -->

 @if ($errors->any())
 <div class="alert alert-danger">
	 <ul>
		 @foreach ($errors->all() as $error)
			 <li>{{ $error }}</li>
		 @endforeach
	 </ul>
 </div>
@endif
 <div class="row">
 	<div class="col-md-12">
 		 
<div id="DocumentResults">
 	<script id="document-template" type="text/x-handlebars-template">
		<form action="{{ route('user.projet.store',$projet->id) }}" method="post" >
			@csrf
 	<table class="table table-bordered table-striped" style="width: 100%">
 	<thead>
 		<tr>
        @{{{thsource}}}
 		</tr>
 	 </thead>
 	 <tbody>
 	 	@{{#each this}}
 	 	<tr>
 	 		@{{{tdsource}}}	
 	 	</tr>
 	 	@{{/each}}
 	 </tbody>
 	</table>
<div class="row">
	<div class="col-6">
		<button type="submit" id="sbmt" class="btn btn-primary" style="margin-top: 10px;">Submit</button> 
	</div>
	<div class="col-6">
		<a href="{{ route('users.add', $projet->id) }}"  class="btn btn-rounded btn-success mb-5" style="margin-top: 10px">Add other</a> 
	</div>
</div> 
</form>
    </script>

 
 			
 		</div> 		





 	</div> 	 <!-- // End col md 12 -->
 </div>  <!-- // END Row  -->
 
 
			       
			</div>
			<!-- /.col -->
		  </div>
		  <!-- /.row -->
		</section>
		<!-- /.content -->
	  
	  </div>
  </div>

 


<script type="text/javascript">
  $(document).on('click','#search',function(){  
    var email = $('#email').val();
	if(email)
   {
     $.ajax({
      url: "{{ route('user.getuser',$projet->id)}}",
      type: "get",
      data: {'email':email},
      beforeSend: function() {       
      },
      success: function (data) {
        var source = $("#document-template").html();
        var template = Handlebars.compile(source);
        var html = template(data);
		
        $('#DocumentResults').html(html);
        $('[data-toggle="tooltip"]').tooltip();
      }
	
    });
}
else {
	$('#DocumentResults').html("Entrez un email");
}

  });

</script>
 



@endsection

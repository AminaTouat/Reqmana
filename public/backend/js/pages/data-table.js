//[Data Table Javascript]

//Project:	Sunny Admin - Responsive Admin Template
//Primary use:   Used only for the Data Table

$(document).ready(function () {
    $.noConflict();
    "use strict";

    $('#example1').DataTable();
    $('#example3').DataTable({"pageLength": 2,
    'paging'      : true,
      'lengthChange': true,
      'searching'   : false,
      'ordering'    : false,
      'info'        : true,
      'autoWidth'   : false

});

    $('#example2').DataTable({
      'paging'      : true,
      'lengthChange': false,
      'searching'   : false,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : false
    });
	
	
	$('#example').DataTable( {
		dom: 'Bfrtip',
		buttons: [
			'copy', 'csv', 'excel', 'pdf', 'print'
		]
	} );
	
	$('#tickets').DataTable({
	  'paging'      : true,
	  'lengthChange': true,
	  'searching'   : true,
	  'ordering'    : true,
	  'info'        : true,
	  'autoWidth'   : false,
	});
	
	$('#productorder').DataTable({
	  'paging'      : true,
	  'lengthChange': true,
	  'searching'   : true,
	  'ordering'    : true,
	  'info'        : true,
	  'autoWidth'   : false,
	});
	

	$('#complex_header').DataTable();
	
	//--------Individual column searching
	
    // Setup - add a text input to each footer cell
    $('#example5 tfoot th').each( function () {
        var title = $(this).text();
        $(this).html( '<input type="text" placeholder="Search '+title+'" />' );
    } );
 
    // DataTable
    var table = $('#example5').DataTable();
 
    // Apply the search
    table.columns().every( function () {
        var that = this;
 
        $( 'input', this.footer() ).on( 'keyup change', function () {
            if ( that.search() !== this.value ) {
                that
                    .search( this.value )
                    .draw();
            }
        } );
    } );
	
	
	//---------------Form inputs
	var table = $('#example6').DataTable();
 
    // $('button').click( function() {
    //     var data = table.$('input, select').serialize();
    //     alert(
    //         "The following data would have been submitted to the server: \n\n"+
    //         data.substr( 0, 120 )+'...'
    //     );
    //     return false;
    // } );
	
	var pressed = false;
    var start = undefined;
    var startX, startWidth;
    
    $("table th").mousedown(function(e) {
        start = $(this);
        pressed = true;
        startX = e.pageX;
        startWidth = $(this).width();
        $(start).addClass("resizing");
    });
    
    $(document).mousemove(function(e) {
        if(pressed) {
            $(start).width(startWidth+(e.pageX-startX));
        }
    });
    
    $(document).mouseup(function() {
        if(pressed) {
            $(start).removeClass("resizing");
            pressed = false;
        }
    });
	
	
  }); // End of use strict
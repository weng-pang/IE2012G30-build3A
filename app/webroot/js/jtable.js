$(document).ready(function ()
{
   // alert("something");
	  var oTable = $('#data').dataTable( {
  		"sPaginationType": "full_numbers" }
	  );
         
    $("tfoot input").keyup(function(){
        /* Filter on the column (the index) of this element */
		oTable.fnFilter( this.value, $("tfoot input").index(this) );
        
    });   
    
    $("tfoot input").each( function (i) {
		asInitVals[i] = this.value;
	} );
	
	$("tfoot input").focus( function () {
		if ( this.className == "search_init" )
		{
			this.className = "";
			this.value = "";
		}
	} );
	
	$("tfoot input").blur( function (i) {
		if ( this.value == "" )
		{
			this.className = "search_init";
			this.value = asInitVals[$("tfoot input").index(this)];
		}
	} );

});

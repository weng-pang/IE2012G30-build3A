$(document).ready(function ()
{
   // alert("something");
    $('#data').dataTable( {
        //don't sort on initial display
        "aaSorting": [],
        "sPaginationType": "full_numbers"
    } );
});

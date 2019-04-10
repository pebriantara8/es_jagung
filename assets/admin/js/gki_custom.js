
// $('div.action-table-link').hidden();
$(document).ready(function(){
    $("tr").hover(function(){

        	// $( this ).find( 'a' ).css("color", "#0073aa");
        	$( this ).find( 'div.action-table-link' ).css("visibility", "visible");

        }, function(){
        	$( this ).find( 'div.action-table-link' ).css("visibility", "hidden");
        	// $( this ).find( 'a' ).css("color", "#ffffff");
    });
});
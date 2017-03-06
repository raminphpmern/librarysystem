// JavaScript Document
jQuery.noConflict(); 
(function($) {  
  $(function() { 
    $(document).ready(function() 
	{

	var validator = $("#frmbooks").validate
	({
		rules:
		{
		   	txttitle:{required:true},
			txtisbn:{required:true},
			txtauthor:{required:true},							
		},
		messages:
		{
		
			txttitle:{required:"Please enter Book Title"},
			txtisbn:{required:"Please enter ISBN No"},
			txtauthor:{required:"Please enter Author Name"},			
													
		},
		errorPlacement: function(error, element)
		{
			if ( element.is(":radio") )
			error.appendTo( element.parent().next().next() );
			else if ( element.is(":checkbox") )
			error.appendTo ( element.next() );
			else
			error.appendTo(element.parent() );
		},
		// specifying a submitHandler prevents the default submit, good for the demo
		submitHandler: function()
		{
			document.frmbooks.submit();
		},
		// set this class to error-labels to indicate valid fields
		success: function(label)
		{
			// set &nbsp; as text for IE			
			//label.html("&nbsp;").addClass("checked");
		}
	});	
	
});
	 }); 
})(jQuery);
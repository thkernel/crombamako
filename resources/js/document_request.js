$(document).ready(function() {
	$("#document_type_id").on('change', function(){
  
        
        selected_document_type = $("#document_type_id").val();

        if (selected_document_type == 1){
	       
	        $(".document-request-structure").css("display", "none");
	        $("#structure_category_id").val('');
	        $("#structure_name").val('');
	        
	    }
	    else if (selected_document_type == 2){
	        $(".document-request-structure").css("display", "block");
	         
	        
	    }
	    

    });

    $(".document-request-structure").css("display", "none");
})

//.empty().trigger('change')
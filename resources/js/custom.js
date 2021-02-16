$(document).ready(function() {
   
   selected = $("#search_terms").val();

	if (selected == 0){
        $(".start_date").css("display", "block");
        $(".end_date").css("display", "block");

        /* Hide */
        
        $("#doctor_id").selectedIndex = 0;
        alert("humm");
        $(".doctor").css("display", "none");
       
        $(".town").css("display", "none");
        $(".neighborhood").css("display", "none");
        
    }
    else if (selected == 1){
        $(".start_date").css("display", "block");
        $(".end_date").css("display", "block");
        
        $(".doctor").css("display", "block");

        /* Hide */
        $(".town").css("display", "none");
        $(".neighborhood").css("display", "none"); 

        
    }
    else if (selected == 2){
        $(".start_date").css("display", "block");
        $(".end_date").css("display", "block");

        $(".town").css("display", "block");
        $(".neighborhood").css("display", "block"); 

        /* Hide */
        
        $(".doctor").css("display", "none");
        
        
        
    }
    else{
        $(".start_date").css("display", "none");
        $(".end_date").css("display", "none");
       
        $(".doctor").css("display", "none");
        

        $(".town").css("display", "none");
        $(".neighborhood").css("display", "none"); 
    }

    filter_search_terms();

        

});

function filter_search_terms(){

	
   

    // On change
	$("#search_terms").on('change', function(){
        
        selected = $("#search_terms").val();

        if (selected == 0){
        $(".start_date").css("display", "block");
        $(".end_date").css("display", "block");

        /* Hide */
        
        $("#doctor_id").selectedIndex = 0;
        alert("humm");
        $(".doctor").css("display", "none");
        
        $(".town").css("display", "none");
        $(".neighborhood").css("display", "none");
        
    }
    else if (selected == 1){
        $(".start_date").css("display", "block");
        $(".end_date").css("display", "block");
        
        $(".doctor").css("display", "block");

        /* Hide */
        $(".town").css("display", "none");
        $(".neighborhood").css("display", "none"); 

        
    }
    else if (selected == 2){
        $(".start_date").css("display", "block");
        $(".end_date").css("display", "block");

        $(".town").css("display", "block");
        $(".neighborhood").css("display", "block"); 

        /* Hide */
       $("#doctor_id").selectedIndex = -1;
        $(".doctor").css("display", "none");
        
        
        
    }
    else{
        $(".start_date").css("display", "none");
        $(".end_date").css("display", "none");
        
        $("#doctor_id").selectedIndex = -1;
        $(".doctor").css("display", "none");

        

        $(".town").css("display", "none");
        $(".neighborhood").css("display", "none"); 
    }


    });
}
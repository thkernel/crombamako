$(document).ready(function() {
    // On change
    $("#search_terms").on('change', function(){

        selected = $("#search_terms").val();

    	if (selected == 0){
            $(".start_date").css("display", "block");
            $(".end_date").css("display", "block");

            /* Hide */
            
            
           
            //$(".doctor").css("display", "none");
            //$("#doctor_id").val('');
           
            $(".town").css("display", "none");
            $(".neighborhood").css("display", "none");

            $("#town_id").val(null).trigger('change');
            $("#neighborhood_id").val(null).trigger('change');
            
        }
        else if (selected == 1){
            $(".start_date").css("display", "block");
            $(".end_date").css("display", "block");
            
            
            //$(".doctor").css("display", "block");
            //$("#doctor_id").val('');

            /* Hide */
            $(".town").css("display", "block");
            $(".neighborhood").css("display", "none");
            
            $("#town_id").val(null).trigger('change');
            $("#neighborhood_id").val(null).trigger('change');

            
        }
        else if (selected == 2){
            $(".start_date").css("display", "block");
            $(".end_date").css("display", "block");

            $(".town").css("display", "block");
            $(".neighborhood").css("display", "block");

             $("#town_id").val(null).trigger('change');
            $("#neighborhood_id").val(null).trigger('change');

            /* Hide */
            
            //$(".doctor").css("display", "none");
            //$("#doctor_id").val('');
            
            
            
        }
        else if(selected == 3){
            $(".start_date").css("display", "block");
            $(".end_date").css("display", "block");

            $(".town").css("display", "block");
            $(".neighborhood").css("display", "block");

             $("#town_id").val(null).trigger('change');
            $("#neighborhood_id").val(null).trigger('change');

            /* Hide */
            
            //$(".doctor").css("display", "none");
            //$("#doctor_id").val('');

        }
        else{
            $(".start_date").css("display", "none");
            $(".end_date").css("display", "none");
           
            
            //$(".doctor").css("display", "none");
            //$("#doctor_id").val('');
            

            $(".town").css("display", "none");
            $(".neighborhood").css("display", "none"); 

             $("#town_id").val(null).trigger('change');
            $("#neighborhood_id").val(null).trigger('change');
        }
    });

    filter_search_terms();

        

});

function filter_search_terms(){

	
   

   
        
    selected = $("#search_terms").val();

    if (selected == 0){
        $(".start_date").css("display", "block");
        $(".end_date").css("display", "block");

        /* Hide */
        
        
        
        //$(".doctor").css("display", "none");
        //$("#doctor_id").val('');
        
        $(".town").css("display", "none");
        $(".neighborhood").css("display", "none");

         $("#town_id").select2("val", "");
            $("#neighborhood_id").select2("val", "");
    
    }
    else if (selected == 1){
        $(".start_date").css("display", "block");
        $(".end_date").css("display", "block");
        
       

        /* Hide */
        $(".town").css("display", "block");
        $(".neighborhood").css("display", "none"); 

         $("#town_id").select2("val", "");
            $("#neighborhood_id").select2("val", "");

    
    }
    else if (selected == 2){
        $(".start_date").css("display", "block");
        $(".end_date").css("display", "block");

        $(".town").css("display", "block");
        $(".neighborhood").css("display", "block"); 

        $("#town_id").select2("val", "");
        $("#neighborhood_id").select2("val", "");


    
    
    
    }
    else if (selected == 3){
        $(".start_date").css("display", "block");
        $(".end_date").css("display", "block");

        $(".town").css("display", "block");
        $(".neighborhood").css("display", "block"); 

        $("#town_id").select2("val", "");
        $("#neighborhood_id").select2("val", "");


    
    
    }
    else{
        $(".start_date").css("display", "none");
        $(".end_date").css("display", "none");
        
    


        $(".town").css("display", "none");
        $(".neighborhood").css("display", "none"); 

         $("#town_id").select2("val", "");
        $("#neighborhood_id").select2("val", "");
    }


    
}
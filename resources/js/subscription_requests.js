$(document).ready(function() {
  
  $("#is_specialist").on('change', function(){
    selected = $("#is_specialist").val();

    
   
    if (selected == "Oui"){
        $(".speciality").css("display", "block");
      }else{
        $(".speciality").css("display", "none");
    }
    });

   is_specialist();
});



function is_specialist(){
  

    selected = $("#is_specialist").val();

    if (selected == "Oui"){
        $(".speciality").css("display", "block");
      }else{
        $(".speciality").css("display", "none");
    }
  

  


}

$(document).ready(function() {
   $("#is_specialist").on('change', function(){
   
    if(this.checked) {
        $(".speciality").css("display", "block");
    }
    else{
        $(".speciality").css("display", "none");
    }

    });

   is_check();
});



function is_check(){


    checked = $('#is_specialist').is(':checked');

    if (checked == 'true'){
        $(".speciality").css("display", "block");
      } else {
        (".speciality").css("display", "none");
      }
  


}

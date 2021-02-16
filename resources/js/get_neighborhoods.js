$(document).ready(function() {

    $('select[name="town_id"]').on('change', function(){
        var townId = $(this).val();
        if(townId) {
            $.ajax({
                url: '/neighborhoods/get/'+townId,
                type:"GET",
                dataType:"json",
                beforeSend: function(){
                    $('#loader').css("visibility", "visible");
                },

                success:function(data) {

                    $('select[name="neighborhood_id"]').empty();

                    $.each(data, function(key, value){

                        $('select[name="neighborhood_id"]').append('<option value="'+ key +'">' + value + '</option>');

                    });
                },
                complete: function(){
                    $('#loader').css("visibility", "hidden");
                }
            });
        } else {
            $('select[name="neighborhood_id"]').empty();
        }

    });

});
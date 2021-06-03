$(document).ready(function() {
try{
    $(this).find('select').each(function() {
      var dropdownParent = $(document.body);

        $(this).select2({
          dropdownParent: dropdownParent,
          width: 'resolve' ,
          //placeholder: 'Sélectionner',
          
        });
    });


    } catch (e) {}

  });
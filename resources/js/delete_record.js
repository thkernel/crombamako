$(document).ready(function() {


	$('.delete-record').on('click', function(event){
		event.preventDefault();
		fetch($(this).attrt('href'))
		.then(response => response.text())
		.then(html => {
			$('body').append(html);
			$('#structure-type-modal').modal('show');
		})
	})

	


		
 });
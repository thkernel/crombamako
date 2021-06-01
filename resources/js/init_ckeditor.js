$(document).ready(function() {
	try {

		/*

		ClassicEditor.create( document.querySelector( '#editor' ), options )
			.then( editor => {
				
				window.editor = editor;
			} )
			.catch( error => {
				console.error( 'There was a problem initializing the editor.', error );
			} );
			*/


				

			    CKEDITOR.replace('editor', 
			    {
			    	

                filebrowserUploadUrl: "{{route('upload', ['_token' => csrf_token() ])}}",
                filebrowserImageUrl: "{{route('upload', ['_token' => csrf_token() ])}}",

        		filebrowserUploadMethod: 'form',

    			});

	} catch (e) {}


})
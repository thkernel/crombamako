$(document).ready(function() {
	try {

/*
		ClassicEditor.defaultConfig = {
			filebrowserImageBrowseUrl: '/laravel-filemanager?type=Images',
    		filebrowserImageUploadUrl: '/laravel-filemanager/upload?type=Images&_token=',
    		filebrowserBrowseUrl: '/laravel-filemanager?type=Files',
    		filebrowserUploadUrl: '/laravel-filemanager/upload?type=Files&_token='
		};


*/

		var options = {
		    filebrowserImageBrowseUrl: '/laravel-filemanager?type=Images',
		    filebrowserImageUploadUrl: '/laravel-filemanager/upload?type=Images&_token=',
		    filebrowserBrowseUrl: '/laravel-filemanager?type=Files',
		    filebrowserUploadUrl: '/laravel-filemanager/upload?type=Files&_token=',
		    filebrowserUploadMethod: 'form'
		  };

		ClassicEditor.create( document.querySelector( '#editor' ), options )
			.then( editor => {
				
				window.editor = editor;
			} )
			.catch( error => {
				console.error( 'There was a problem initializing the editor.', error );
			} );

	} catch (e) {}


})
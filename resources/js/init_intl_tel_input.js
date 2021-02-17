
$(document).ready(function() {
	try{
	$("#phone").intlTelInput({
	    formatOnInit: true,
	    formatOnDisplay: true,
	    separateDialCode: true,
	    preferredCountries: ['ml'],
	    utilsScript: require("../../vendor/bracket/lib/intl-tel-input/build/js/utils.js"),
  	});
  } catch (e) {}
  });
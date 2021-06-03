$(document).ready(function() {

try {
const PerfectScrollbar = require('perfect-scrollbar').default;

//const containerv = document.querySelector('.sideleft-scrollbar');
new PerfectScrollbar('.sideleft-scrollbar', {
    suppressScrollX: true
  });

} catch (e) {}

});
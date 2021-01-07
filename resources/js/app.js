require('./bootstrap');
var Turbolinks = require("turbolinks")
Turbolinks.start();
require('alpinejs');
require('./bracket/js/bracket.js');
require('./bracket/js/dashboard.js');
require('./perfect-scrollbar/perfect-scrollbar.min.js');
require('./select2/select2.full.min.js');
require('datatables.net');
require( 'datatables.net-responsive');
require('./init_datatables');
require('./ckeditor5-build-classic/ckeditor.js');
require('./init_ckeditor');
require('./init_select2');
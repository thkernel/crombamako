require('./bootstrap');
var Turbolinks = require("turbolinks")
Turbolinks.start();
require('alpinejs');
//require('./perfect-scrollbar/dist/perfect-scrollbar.min.js');
require('../../vendor/bracket/lib/moment/moment.js');

require('../../vendor/bracket/js/bracket.js');
require('../../vendor/bracket/js/dashboard.js');
//require('./bracket/js/dashboard.js');

require('../../vendor/bracket/lib/jquery-ui/ui/widgets/datepicker');
require('../../vendor/bracket/lib/bootstrap/js/bootstrap.bundle.min');
// require lib/perfect-scrollbar/perfect-scrollbar.min
require('../../vendor/bracket/lib/peity/jquery.peity.min');
require('../../vendor/bracket/lib/rickshaw/vendor/d3.min');
require('../../vendor/bracket/lib/rickshaw/vendor/d3.layout.min');
//= require lib/rickshaw/rickshaw.min
//= require lib/jquery.flot/jquery.flot
//= require lib/jquery.flot/jquery.flot.resize
//= require lib/flot-spline/js/jquery.flot.spline.min
//= require lib/jquery-sparkline/jquery.sparkline.min
//= require lib/echarts/echarts.min

//require('./bracket/js/dashboard.js');
require('./select2/select2.full.min.js');
require('datatables.net');
require( 'datatables.net-responsive');
require('./init_datatables');
require('./ckeditor5-build-classic/ckeditor.js');
require('./init_ckeditor');
require('./init_select2');
require('./init_ps');
//require('./delete_record');
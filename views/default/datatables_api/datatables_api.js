define(function (require) {
    var elgg = require('elgg');
    var $ = require('jquery');
    
    // get plugin settings
    var dt_settings = require("datatables_api/settings");
    var button_enabled = dt_settings['button_enabled'];

    var dtOptions = {};
    if (button_enabled) {
        require('datatables.net-buttons');
        require('dataTables_buttons_flash_js');
        require('dataTables_jszip_js');
        require('dataTables_pdfmake_js');
        require('dataTables_vfs_fonts_js');
        require('dataTables_buttons_html5_js');
        require('dataTables_buttons_print_js');
        
        dtOptions = {
            dom: 'Bfrtip',
            buttons: ['copy', 'csv', 'pdf', 'print']
        }
    }
    
    $(document).ready(function() {
        $('#dt_layout').DataTable(dtOptions);        
    });
     
});

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
            dom: 'Blfrtip',
            buttons: ['copy', 'csv', 'pdf', 'print']
        }
        
    }
    
    dtOptions['lengthMenu'] = [ [10, 25, 50, -1], [10, 25, 50, "All"] ];
//    dtOptions['lengthMenu'] = [ 10, 25, 50, 75, 100 ];
    
    dtOptions['ajax'] = $(".dt_hidden").data("ajaxsource");
    dtOptions['pageLength'] = $(".dt_hidden").data("limit");
    dtOptions['processing'] = true;
    dtOptions['serverSide'] = true;
    
    
    var titles =  $(".dt_hidden").data("titles");
    var titles_arr = titles.split(",");
    var list = []; 
    titles_arr.forEach( function (item,index) {
        list.push({ "data": item }); 
        return list;
    });
    dtOptions['columns'] = list;    
    
    $(document).ready(function() {
        $('#dt_layout').DataTable(dtOptions);        
    });
    
     
});

<?php
/**
 * Elgg DataTables API plugin
 * @package datatables_api
 */
 
elgg_register_event_handler('init', 'system', 'datatables_api_init');

/**
 * datatables_api plugin initialization functions.
 */
function datatables_api_init() {
 	
    // register css files
    elgg_register_css('datatables_css', elgg_get_simplecache_url('datatables.css'));
    
    // register extra css
    elgg_extend_view('elgg.css', 'datatables_api/datatables_api.css');
    elgg_extend_view('css/admin', 'datatables_api/datatables_api_admin.css');
        
    elgg_define_js('datatables', array(
        'deps' => array('jquery'),
        'exports' => 'datatables',
    ));

}


?>

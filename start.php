<?php
/**
 * Elgg DataTables API plugin
 * @package datatables_api
 */
 
require_once(dirname(__FILE__) . '/lib/hooks.php');
require_once(dirname(__FILE__) . '/lib/widgets.php');

elgg_register_event_handler('init', 'system', 'datatables_api_init');

/**
 * datatables_api plugin initialization functions.
 */
function datatables_api_init() {
 	
    // register a library of helper functions
    elgg_register_library('elgg:datatables_api', elgg_get_plugins_path() . 'datatables_api/lib/datatables_api.php');
    
    // register css files
    elgg_register_css('datatables_css', elgg_get_simplecache_url('datatables.css'));
    
    // register extra css
    elgg_extend_view('elgg.css', 'datatables_api/datatables_api.css');
    elgg_extend_view('css/admin', 'datatables_api/datatables_api_admin.css');
        
    elgg_define_js('datatables', array(
        'deps' => array('jquery'),
        'exports' => 'datatables',
    ));
    
    // register menu item in admin area
    if (elgg_get_context() == 'admin') {
        elgg_register_menu_item('page', array(
            'name' => 'entities_browser',
            'href' => elgg_normalize_url('admin/datatables_api/elgg_objects'),
            'text' => elgg_echo('admin:datatables_api:menu:elgg_objects'),
            'context' => 'admin',
            'section' => 'datatables_api_section',
        ));
    }     
    
    // loads the widgets
    // datatables_api_widgets_init();

    // Register actions admin
    // $action_path = elgg_get_plugins_path() . 'datatables_api/actions/datatables_api';
    
}


?>

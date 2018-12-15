<?php
/**
 * Elgg DataTables API plugin
 * @package datatables_api
 */

return [

    'datatables_api' => "DataTables API for Elgg",
    
    // admin
    'menu:page:header:datatables_api_section' => 'List Entities',
    'admin:datatables_api:menu:elgg_objects' => 'Elgg Objects',
    'admin:datatables_api' => 'DataTables API',
    'admin:datatables_api:elgg_objects' => 'List of Elgg Object Entities',
    'admin:datatables_api:empty_list' => 'You have to enable the type of entities you wish to include on this list',
    'admin:datatables_api:no_results' => 'No results',
    
    'admin:datatables_api:missing:action' => 'Action param is missing',
    'admin:datatables_api:missing:headers' => 'Table headers are missing',
    
    'datatables_api:settings:file_export' => 'Enable buttons',
    'datatables_api:settings:file_export:help' => 'Check this if want to enable buttons for file export (csv, pdf, print etc).',
];

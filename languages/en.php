<?php
/**
 * Elgg DataTables API plugin
 * @package datatables_api
 */

$lang = array(

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
    
//    'datatables_api:admin:elgg_objects:table:header:id' => 'ID',
//    'datatables_api:admin:elgg_objects:table:header:title' => 'Title',
//    'datatables_api:admin:elgg_objects:table:header:type' => 'Type',
//    'datatables_api:admin:elgg_objects:table:header:container' => 'Container',
//    'datatables_api:admin:elgg_objects:table:header:access' => 'Access Level',
//    'datatables_api:admin:elgg_objects:table:header:owner' => 'Owner',
//    'datatables_api:admin:elgg_objects:table:header:created' => 'Created',
//    'datatables_api:admin:elgg_objects:table:header:updated' => 'Updated',
//    'datatables_api:admin:elgg_objects:table:header:actions' => 'Actions',
//    'datatables_api:admin:elgg_objects:view_entity' => 'View entity details',
//    'datatables_api:admin:elgg_objects:view_owner' => 'View owner entity',
//    'datatables_api:admin:elgg_objects:view_container' => 'View container entity',
    
    'datatables_api:settings:file_export' => 'Enable buttons',
    'datatables_api:settings:file_export:help' => 'Check this if want to enable buttons for file export (csv, pdf, print etc).',
);

add_translation("en", $lang);

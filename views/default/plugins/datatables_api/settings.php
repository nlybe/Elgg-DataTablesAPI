<?php
/**
 * Elgg DataTables API plugin
 * @package datatables_api
 */

$plugin = elgg_get_plugin_from_id(DatatablesApiOptions::PLUGIN_ID);

echo elgg_view_field([
    'id' => 'file_export',
    '#type' => 'checkbox',
    'name' => 'params[file_export]',
    'checked' => ($plugin->file_export ? true : false),
    '#label' => elgg_echo('datatables_api:settings:file_export'),
    '#help' => elgg_echo('datatables_api:settings:file_export:help'),
]);
<?php
/**
 * Elgg DataTables API plugin
 * @package datatables_api
 */

use DatatablesApi\DatatablesApiOptions;

$plugin = elgg_get_plugin_from_id(DatatablesApiOptions::PLUGIN_ID);

echo elgg_view_field([
    'id' => 'file_export',
    '#type' => 'checkbox',
    'name' => 'params[file_export]',
    'default' => 'no',
    'switch' => true,
    'value' => 'yes',
    'checked' => ($plugin->file_export === 'yes'), 
    '#label' => elgg_echo('datatables_api:settings:file_export'),
    '#help' => elgg_echo('datatables_api:settings:file_export:help'),
]);
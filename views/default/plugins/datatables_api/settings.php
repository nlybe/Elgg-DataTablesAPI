<?php
/**
 * Elgg DataTables API plugin
 * @package datatables_api
 */

$plugin = elgg_get_plugin_from_id(DatatablesApiOptions::PLUGIN_ID);

echo elgg_format_element('div', [], elgg_view_input('checkbox', array(
    'id' => 'file_export',
    'name' => 'params[file_export]',
    'checked' => ($plugin->file_export ? true : false),
    'label' => elgg_echo('datatables_api:settings:file_export'),
    'help' => elgg_echo('datatables_api:settings:file_export:help'),
)));
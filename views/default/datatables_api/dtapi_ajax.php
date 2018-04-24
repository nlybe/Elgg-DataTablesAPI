<?php
/**
 * Elgg DataTables API plugin
 * @package datatables_api
 */

elgg_require_js("datatables_api/dtapi_ajax");
elgg_load_css('datatables_css');

if (DatatablesApiOptions::areButtonsEnabled()) {
    elgg_load_css('datatables_buttons_css');
}

$action = elgg_extract('action', $vars, '');
$headers = elgg_extract('headers', $vars, '');
$footers = elgg_extract('footers', $vars, '');
$limit = elgg_extract('limit', $vars, max((int) elgg_get_config('default_limit'), 0));

if (!$action) {
    echo elgg_echo('admin:datatables_api:missing:action');
    return;
}

if (!$headers) {
    echo elgg_echo('admin:datatables_api:missing:headers');
    return;
}

// build table header 
$dt_titles = [];
foreach ($headers as $e) {
    array_push($dt_titles, $e['name']);
    $dt_header .= elgg_format_element('th', [], $e['label']); 
}

// build table footer
if (is_array($footers) && count($footers) > 0) {
    foreach ($footers as $e) {
        $dt_footer .= elgg_format_element('th', [], $e['label']); 
    }  
}
else {  
    // set same as header if not set
    $dt_footer = $dt_header; 
}

echo elgg_format_element('div', [
        'class' => 'dt_hidden', 
        'data-ajaxsource' => elgg_normalize_url($action),
        'data-titles' => implode(",",$dt_titles),
        'data-limit' => $limit,
    ], '&nbsp;');

?>

<table id="dt_layout" class="display" cellspacing="0" width="100%">
    <thead>
        <tr>
            <?php echo $dt_header; ?>
        </tr>
    </thead>
    <tfoot>
        <tr>
            <?php echo $dt_footer; ?>
        </tr>
    </tfoot>
</table>

<?php
// unset variables
unset($dt_titles);
unset($dt_sub_titles);
unset($vars);


<?php
/**
 * Elgg DataTables API plugin
 * @package datatables_api
 */

elgg_require_js("datatables_api/datatables_api");
elgg_load_css('datatables_css');

$col_sync_err = false;

// build table header 
$dt_titles = elgg_extract('dt_titles', $vars, '');
foreach ($dt_titles as $title) {
    $dt_header .= elgg_format_element('th', [], $title); 
}
$dt_titles_no = count($dt_titles);

// build table footer
$dt_sub_titles = elgg_extract('dt_footer', $vars, '');
if (is_array($dt_sub_titles) && count($dt_footer_tmp) > 0) {
    foreach ($dt_sub_titles as $element) {
        $dt_footer .= elgg_format_element('th', [], $element); 
    }  
}
else {  // set same as header if not set
    $dt_footer = $dt_header; 
}

// build table data
$dt_data = elgg_extract('dt_data', $vars, '');
foreach ($dt_data as $row) {
    $dt_row = '';
    
    // we check if there is at least one column count difference
    if ($dt_titles_no != count($row)) {
        $col_sync_err = true;
    }
    foreach ($row as $d) {
        $dt_row .= elgg_format_element('td', [], $d); 
    }
    $dt_body .= elgg_format_element('tr', [], $dt_row); 
}

if ($col_sync_err) {
    register_error(elgg_echo('admin:lectures:stats:table:col_error'));
}
?>

<table id="example" class="display" cellspacing="0" width="100%">
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
    <tbody>
        <?php echo $dt_body; ?>
    </tbody>
</table>

<?php
// unset variables
unset($dt_titles);
unset($dt_data);
unset($dt_sub_titles);
unset($vars);


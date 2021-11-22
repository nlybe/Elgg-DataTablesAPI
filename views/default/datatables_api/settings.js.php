<?php
/**
 * Elgg DataTables API plugin
 * @package datatables_api
 */

use DatatablesApi\DatatablesApiOptions;

$settings = [
    'button_enabled' => DatatablesApiOptions::areButtonsEnabled(),
];

?>

define(<?php echo json_encode($settings); ?>);

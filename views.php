<?php
/**
 * Elgg DataTables API plugin
 * @package datatables_api
 */

return [
    'default' => [
        'datatables_api/images/' => __DIR__ . '/vendor/datatables/datatables/media/images',
        'datatables.js' => elgg_get_site_url() . 'vendor/datatables/datatables/media/js/jquery.dataTables.js',
        'datatables.css' => elgg_get_site_url() . 'vendor/datatables/datatables/media/css/jquery.dataTables.css',
    ],
];

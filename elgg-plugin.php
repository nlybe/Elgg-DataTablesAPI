<?php
/**
 * Elgg DataTables API plugin
 * @package datatables_api
 */

use DatatablesApi\Elgg\Bootstrap;

return [
    'bootstrap' => Bootstrap::class,
    'settings' => [
        'file_export' => 'no',
    ],
    'views' => [
        'default' => [
            'datatables_api/images/' => __DIR__ . '/../../vendor/datatables/datatables/media/images',
            'datatables.net.js' => __DIR__ . '/../../vendor/datatables/datatables/media/js/jquery.dataTables.js',
            'datatables.css' => __DIR__ . '/../../vendor/datatables/datatables/media/css/jquery.dataTables.css',
        ],
    ],
    'upgrades' => [],
];

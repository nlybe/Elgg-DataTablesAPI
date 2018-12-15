<?php
/**
 * Elgg DataTables API plugin
 * @package datatables_api
 */

return [
    'actions' => [],
    'routes' => [],
    'widgets' => [],
    'views' => [
        'default' => [
            'datatables_api/images/' => __DIR__ . '/../../vendor/datatables/datatables/media/images',
            'datatables.net.js' => __DIR__ . '/../../vendor/datatables/datatables/media/js/jquery.dataTables.js',
            'datatables.css' => __DIR__ . '/../../vendor/datatables/datatables/media/css/jquery.dataTables.css',            
        ],
    ],
    'upgrades' => [],
];

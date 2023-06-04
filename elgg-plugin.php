<?php
/**
 * Elgg DataTables API plugin
 * @package datatables_api
 */

use DatatablesApi\Elgg\Bootstrap;

return [
    'plugin' => [
        'name' => 'DataTables API',
		'version' => '4.13',
		'dependencies' => [],
	],	
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
	'view_extensions' => [
		'elgg.css' => [
			'datatables_api/datatables_api.css' => [],
            '//cdn.datatables.net/buttons/2.3.6/css/buttons.dataTables.min.css' => [],      // file export buttons
		],
		'css/admin' => [
			'datatables_api/datatables_api_admin.css' => [],
		],
	],
    'upgrades' => [],
];

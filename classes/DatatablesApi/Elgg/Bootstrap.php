<?php
/**
 * Elgg DataTables API plugin
 * @package datatables_api
 */

namespace DatatablesApi\Elgg;

use Elgg\DefaultPluginBootstrap;
// use DatatablesApi\DatatablesApiOptions;

class Bootstrap extends DefaultPluginBootstrap {
	
	const HANDLERS = [];
	
	/**
	 * {@inheritdoc}
	 */
	public function init() {
		$this->initViews();
	}

	/**
	 * Init views
	 *
	 * @return void
	 */
	protected function initViews() {
		
		// register settings js
		elgg_register_simplecache_view('datatables_api/settings.js');    
			
		elgg_define_js('datatables.net', [
			'deps' => ['jquery'],
			'exports' => 'datatables.net',
		]);

		elgg_define_js('datatables.net-buttons', [
			'src' => "//cdn.datatables.net/buttons/2.3.6/js/dataTables.buttons.min.js",
			'deps' => ['jquery', 'datatables.net'],
			'exports' => 'datatables.net-buttons',
		]);
	
		elgg_define_js('dataTables_buttons_flash_js', [
			'deps' => ['jquery'],
			'src' => "//cdnjs.cloudflare.com/ajax/libs/datatables-buttons/2.2.0/js/buttons.flash.min.js",
			'exports' => 'dataTables_buttons_flash_js',
		]);
	
		elgg_define_js('dataTables_jszip_js', [
			'deps' => ['jquery'],
			'src' => "//cdnjs.cloudflare.com/ajax/libs/jszip/3.7.1/jszip.min.js",
			'exports' => 'dataTables_jszip_js',
		]);
	
		elgg_define_js('dataTables_pdfmake_js', [
			'deps' => ['jquery'],
			'src' => "//cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.4/pdfmake.min.js",
			'exports' => 'dataTables_pdfmake_js',
		]);
	
		elgg_define_js('dataTables_vfs_fonts_js', [
			'deps' => ['jquery', 'dataTables_pdfmake_js'],
			'src' => "//cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.4/vfs_fonts.js",
			'exports' => 'dataTables_vfs_fonts_js',
		]);
	
		elgg_define_js('dataTables_buttons_html5_js', [
			'deps' => ['jquery', 'datatables.net-buttons'],
			'src' => "//cdn.datatables.net/buttons/2.3.6/js/buttons.html5.min.js",
			'exports' => 'dataTables_buttons_html5_js',
		]);
	
		elgg_define_js('dataTables_buttons_print_js', [
			'deps' => ['jquery', 'datatables.net-buttons'],
			'src' => "//cdn.datatables.net/buttons/2.3.6/js/buttons.print.min.js",
			'exports' => 'dataTables_buttons_print_js',
		]);
		
	}
}

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
				
		// register extra css
		elgg_extend_view('elgg.css', 'datatables_api/datatables_api.css');
		elgg_extend_view('css/admin', 'datatables_api/datatables_api_admin.css');

		// used for file export buttons
		elgg_extend_view('elgg.css', '//cdn.datatables.net/buttons/1.6.4/css/buttons.bootstrap.min.css');
		
		// register settings js
		elgg_register_simplecache_view('datatables_api/settings.js');    
			
		elgg_define_js('datatables.net', array(
			'deps' => array('jquery'),
			'exports' => 'datatables.net',
		));
		
		elgg_define_js('datatables.net-buttons', array(
			'src' => "//cdn.datatables.net/buttons/1.6.4/js/dataTables.buttons.min.js",
			'deps' => array('jquery', 'datatables.net'),
			'exports' => 'datatables.net-buttons',
		));
	
		elgg_define_js('dataTables_buttons_flash_js', array(
			'deps' => array('jquery'),
			'src' => "//cdn.datatables.net/buttons/1.6.4/js/buttons.flash.min.js",
			'exports' => 'dataTables_buttons_flash_js',
		));
	
		elgg_define_js('dataTables_jszip_js', array(
			'deps' => array('jquery'),
			'src' => "//cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js",
			'exports' => 'dataTables_jszip_js',
		));
	
		elgg_define_js('dataTables_pdfmake_js', array(
			'deps' => array('jquery'),
			'src' => "//cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js",
			'exports' => 'dataTables_pdfmake_js',
		));
	
		elgg_define_js('dataTables_vfs_fonts_js', array(
			'deps' => array('jquery', 'dataTables_pdfmake_js'),
			'src' => "//cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js",
			'exports' => 'dataTables_vfs_fonts_js',
		));
	
		elgg_define_js('dataTables_buttons_html5_js', array(
			'deps' => array('jquery', 'datatables.net-buttons'),
			'src' => "//cdn.datatables.net/buttons/1.6.4/js/buttons.html5.min.js",
			'exports' => 'dataTables_buttons_html5_js',
		));
	
		elgg_define_js('dataTables_buttons_print_js', array(
			'deps' => array('jquery', 'datatables.net-buttons'),
			'src' => "//cdn.datatables.net/buttons/1.6.4/js/buttons.print.min.js",
			'exports' => 'dataTables_buttons_print_js',
		));
	}
}

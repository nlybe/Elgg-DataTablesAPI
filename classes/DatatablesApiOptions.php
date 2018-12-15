<?php
/**
 * Elgg DataTables API plugin
 * @package datatables_api
 */

class DatatablesApiOptions {

    const PLUGIN_ID = 'datatables_api';               // current plugin ID
    
    /**
     * Get param value from settings
     * 
     * @return type
     */
    Public Static function getParams($setting_param = ''){
        if (!$setting_param) {
            return false;
        }
        
        return trim(elgg_get_plugin_setting($setting_param, self::PLUGIN_ID)); 
    }     
    
    /** 
     * Check if display buttons is enabled in settings
     * 
     * @return boolean
     */
    Public Static function areButtonsEnabled() {
        $file_export = DatatablesApiOptions::getParams('file_export');

        if ($file_export) {
            return true;
        }
        
        return false;
    }
}

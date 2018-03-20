<?php
/**
 * Elgg DataTables API plugin
 * @package datatables_api
 */


class DatatablesApiOptions {

    const PLUGIN_ID = 'datatables_api';                   // current plugin ID
    const DT_API_YES = 'yes';                         // general purpose value for yes
    const DT_API_NO = 'no';                           // general purpose value for no
    
    /** 
     * Check if privacy notication text has been entered in settings
     * 
     * @return boolean
     */
    Public Static function areButtonsEnabled() {
        $file_export = elgg_get_plugin_setting('file_export', self::PLUGIN_ID);

        if ($file_export) {
            return true;
        }
        
        return false;
    }
}

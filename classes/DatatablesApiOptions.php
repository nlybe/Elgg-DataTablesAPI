<?php
/**
 * Elgg DataTables API plugin
 * @package datatables_api
 */


class DatatablesApiOptions {

    const DT_API_ID = 'datatables_api';                   // current plugin ID
    //const PAPI_SUBTYPE = 'paypal_transaction';      // objects subtype for successful paypal transactions
    const DT_API_YES = 'yes';                         // general purpose value for yes
    const DT_API_NO = 'no';                           // general purpose value for no
    
    
    /**
     * Get the current PayPal mode, according plugin settings
     * Default if not set is sandbox
     *  
     * @return type
     */
    Public Static function getEnabledEntitiesOnBrowser() {
        $enables_types = array();
        
        $types = get_registered_entity_types();
        foreach ($types as $key => $t) {
            if ($key == 'object') {
                $sub_arr = $t;
                
                foreach ($sub_arr as $sub) {
                    $setting = elgg_get_plugin_setting('datatables_api_' . $sub, self::DT_API_ID);

                    if ($setting == self::DT_API_YES) {
                        array_push($enables_types, $sub);
                    }                    
                }                
            }
        }
        
        return $enables_types;        
    }
          
}

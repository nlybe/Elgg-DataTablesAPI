<?php
/**
 * Elgg DataTables API plugin
 * @package datatables_api
 */

$plugin = elgg_get_plugin_from_id('datatables_api');

$potential_yes_no = array(
    elgg_echo('datatables_api:settings:yes') => DatatablesApiOptions::DT_API_YES,
    elgg_echo('datatables_api:settings:no') => DatatablesApiOptions::DT_API_NO,
);

$types = get_registered_entity_types();

$output = elgg_format_element(
    'div', 
    ['style' => 'margin: 0 0 15px;'], 
    elgg_echo('datatables_api:settings:basic_settings:intro'
));
foreach ($types as $key => $t) {

    if ($key == 'user' || $key == 'group') {
//  do nothing at the moment        
//        $tmp = elgg_format_element('div', [], elgg_format_element('strong', [], $key));
//        
//        $param_name_entity = 'datatables_api_' . $key;
//        $param_name = 'params[' . $param_name_entity . ']';
//        $tmp .= elgg_view_input('radio', array(
//            'name' => $param_name, 
//            'value' => ($plugin->$param_name_entity?$plugin->$param_name_entity:DatatablesApiOptions::DT_API_NO), 
//            'options' => $potential_yes_no, 
//            'align' => 'horizontal'
//        ));
//        
//        //$tmp .= elgg_format_element('span', ['class' => 'elgg-subtext'], '');
//        
//        $line = elgg_format_element('div', ['class' => 'input_box'], $tmp);
//        $output .= elgg_view_module("inline", '', $line);
    } 
    else {
        if ($key == 'object') {
            $sub_arr = $t;

            foreach ($sub_arr as $sub) {
                $tmp = elgg_format_element('div', [], elgg_format_element('strong', [], $sub));
                
                $param_name_entity = 'datatables_api_' . $sub;
                $param_name = 'params[' . $param_name_entity . ']';
                $tmp .= elgg_view_input('radio', array(
                    'name' => $param_name, 
                    'value' => ($plugin->$param_name_entity?$plugin->$param_name_entity:DatatablesApiOptions::DT_API_NO), 
                    'options' => $potential_yes_no, 
                    'align' => 'horizontal'
                ));
                
                //$tmp .= elgg_format_element('span', ['class' => 'elgg-subtext'], '');
                
                $line = elgg_format_element('div', ['class' => 'input_box'], $tmp);
                $output .= elgg_view_module("inline", '', $line);
            }
        }
    }
}

$title = elgg_format_element('h3', [], elgg_echo('menu:page:header:datatables_api_section'));
echo elgg_view_module('inline', '', $output, ['header' => $title]);
DataTables API for Elgg
=======================

![Elgg 2.2](https://img.shields.io/badge/Elgg-2.2-orange.svg?style=flat-square)

[DataTables](https://datatables.net/) integration on Elgg. This plugin offers an API which can be used from other plugins on Elgg platforms in order to populate information in data tables.


## How to Use
The sample code below will display a simple datatable with 3 columns.
```php
// set an array with titles of table
$vars['dt_titles'] = array(
    elgg_echo('my_plugin:datatables:example:title1'),
    elgg_echo('my_plugin:datatables:example:title2'),
    elgg_echo('my_plugin:datatables:example:title3'),
);

// set an array with data of table
$dt_data = [];
$entities = elgg_get_entities($options);
foreach (entities as $e) {
    $dt_data_tmp = [];
    $dt_data_tmp['guid'] = $e->getGUID();
    $dt_data_tmp['title'] = $e->title;
    $dt_data_tmp['likes'] = calculate_likes_function($e);
}
array_push($dt_data, $dt_data_tmp);    
$vars['dt_data'] = $dt_data;
   
elgg_view('datatables_api/datatables_api', $vars)
```

## Future Tasks List
- Load data dynamically by using ajax/json
- Make a classe for datatable, so all parameters will be passed by using method of this class
- Integrate more options from [DataTables](https://datatables.net/)

DataTables API for Elgg
=======================

![Elgg 2.2](https://img.shields.io/badge/Elgg-2.2-orange.svg?style=flat-square)

[DataTables](https://datatables.net/) integration on Elgg. This plugin offers an API which can be used from other plugins on Elgg platforms in order to populate information in data tables.

DataTables is a plug-in for the jQuery Javascript library. It is a highly flexible tool, based upon the foundations of progressive enhancement, and will add advanced interaction controls to any HTML table.

At the moment plugin offers the option to create a simple DataTable.

As a usage example there are lists of entities in admin area with option to select which types of entities to include

## How to Use
The sample code below will display a DataTable with 3 columns.
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
    $dt_data_tmp['likes'] = calculate_likes($e);

    array_push($dt_data, $dt_data_tmp);    
}
$vars['dt_data'] = $dt_data;
   
echo elgg_view('datatables_api/datatables_api', $vars);
```
Also you can see the example on file views/default/admin/datatables_api/elgg_objects.php

## Future Tasks List
- [ ] Load data dynamically by using ajax/json
- [ ] Make a class for datatables, so all parameters will be passed by using methods of this class
- [ ] Integrate more options from [DataTables](https://datatables.net/examples/index/) like styling, search by column etc

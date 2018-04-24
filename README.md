DataTables API for Elgg
=======================

![Elgg 2.3](https://img.shields.io/badge/Elgg-2.3-orange.svg?style=flat-square)

[DataTables](https://datatables.net/) integration on Elgg. This plugin offers an API which can be used from other plugins on Elgg platforms in order to populate information in data tables.

[DataTables](https://datatables.net/) is a plug-in for the jQuery Javascript library. It is a highly flexible tool, based upon the foundations of progressive enhancement and offers advanced interaction controls to any HTML table.

The plugin for Elgg offers the following options:
* Create a simple DataTable by loading all records (not suggested for large data set). 
* Get records from database by using ajax requests.
* Use server-side options that DataTables provides, so all paging, searching and ordering actions are being made by using ajax requests to get the required data.
* Add export buttons such as copy, csv, pdf and print, if enabled in settings. 

As a usage example you can see the [Elgg Entity Lists](https://github.com/nlybe/Elgg-Entity-Lists) which uses the datatables_api plugin for generating lists of Elgg entities.

## Installation
Use composer to install this plugin. On site root folder, run the command:
```
composer require nlybe/datatables_api
```

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


## Future Tasks List
- [ ] Make a class for datatables, so all parameters will be passed by using methods of this class
- [ ] Integrate more options from [DataTables](https://datatables.net/examples/index/) like styling, search by column etc

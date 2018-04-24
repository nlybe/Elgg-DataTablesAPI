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

### Example 1 - Use ajax request and Server-side processing
```php
$dt_options = [
    'action' => 'demoplugin/users',
];

$dt_options['headers'] = [ 
    ['name' => 'id', 'label' => elgg_echo('ID')],
    ['name' => 'name', 'label' => elgg_echo('Name')],
    ['name' => 'username', 'label' => elgg_echo('Username')],
    ['name' => 'email', 'label' => elgg_echo('Email')],
    ['name' => 'created', 'label' => elgg_echo('Created')],
    ['name' => 'updated', 'label' => elgg_echo('Updated')],
    ['name' => 'actions', 'label' => elgg_echo('Actions')],
];    

echo elgg_view('datatables_api/dtapi_ajax', $dt_options);
```

On 'views/default/resources/demoplugin/users.php' use the following code:
```php
$search = get_input('search');

$options = array(
    'type' => 'user',
    'limit' => 0,
    'count' => true,
);

$options["joins"] = [];
$options["wheres"] = [];
$dbprefix = elgg_get_config('dbprefix');
if ($search && !empty($search['value'])) {
    $query = sanitise_string($search['value']);
		
    array_push($options["joins"], "JOIN {$dbprefix}users_entity ge ON e.guid = ge.guid");
    array_push($options["wheres"], "(ge.name LIKE '%$query%' OR ge.username LIKE '%$query%' OR ge.email LIKE '%$query%')");
}

$totalEntries = elgg_get_entities_from_metadata($options);

$options['count'] = false;
$options['limit'] = max((int) get_input("length", elgg_get_config('default_limit')), 0);
$options['offset'] = sanitise_int(get_input ("start", 0), false);
$entities = elgg_get_entities_from_metadata($options);

$dt_data = [];
if ($entities) {    
    foreach ($entities as $e) {
        $dt_data_tmp = [];
        
        // datatable 
        $dt_data_tmp['id'] = $e->getGUID();
        $dt_data_tmp['name'] = elgg_view('output/url', array(
            'href' => $e->getURL(),
            'text' => $e->name,
            'title' => elgg_echo('entity_lists:admin:elgg_objects:view_entity'),
            'is_trusted' => true,
        )); 
        $dt_data_tmp['username'] = elgg_view('output/url', array(
            'href' => $e->getURL(),
            'text' => $e->username,
            'title' => elgg_echo('entity_lists:admin:elgg_objects:view_entity'),
            'is_trusted' => true,
        )); 
        
        $dt_data_tmp['email'] = $e->email;
        $dt_data_tmp['created'] = date("r", $e->time_created);
        $dt_data_tmp['updated'] = date("r", $e->time_updated);
        $dt_data_tmp['actions'] = elgg_view('output/url', array(
            'href' => "action/entity/delete?guid={$e->getGUID()}",
            'text' => elgg_view_icon('remove'),
            'title' => elgg_echo('delete:this'),
            'is_action' => true,
            'data-confirm' => elgg_echo('deleteconfirm'),
        ));

        array_push($dt_data, $dt_data_tmp);       
    }
} 

$total_rows = count($entities);
$draw = get_input('draw');
$result = [
    'draw' => isset($draw)?intval($draw):1,
    'recordsTotal' => $totalEntries,
    'recordsFiltered' => $totalEntries,
    'data' => $dt_data,
];

// release variables
unset($entities);

echo json_encode($result);
exit;
```

### Example 2
The sample code below will display a DataTable with 3 columns. It's suggested for small about of records only.
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
- [ ] Fix ordering when use server-side options

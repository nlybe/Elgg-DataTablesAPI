define(function (require) {
    var elgg = require('elgg');
    var $ = require('jquery');
    require('datatables');
       
    $(document).ready(function() {
        $('#example').DataTable( {
//            "processing": true,
//            "serverSide": true,
//            "ajax": "scripts/server_processing.php"
        } );        
    });
    
});

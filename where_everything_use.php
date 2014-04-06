<?php
    require_once('where_everything_class.php');

    $obj = new where_everywhere();

    // terms to search for (space seperated)
    $obj->search_value = 'pies pastries puddings';

    // Which tables to check (space seperated)
    $obj->search_fields = 'bank bakery barristers';

    // Generate that addition to the where clause
    $obj->where_clause();

    // display it.
    echo $obj->where_extension;
?>

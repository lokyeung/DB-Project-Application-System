<?php

// please fetch by db2 query!!!!!
$activity_list = array(
    array(
        'type' => '1',
        'id' => '1',
        'name' => 'DN150502 Sevillanas Dance',
        'deadline' => '2015-05-06',
        'date' => array(
            '2015-05-15',
            '2015-05-22',
        ),
        'status' => 1,
    ),
    array(
        'type' => '1',
        'id' => '1',
        'name' => 'DN150502 Sevillanas Dance',
        'deadline' => '2015-05-06',
        'date' => array(
            '2015-05-15',
            '2015-05-22',
        ),
        'status' => 1,
    ),
);

$data = json_encode($activity_list);

exit($data);

?>
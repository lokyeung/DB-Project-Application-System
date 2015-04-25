<?php

require_once './common.inc.php';

if (!$user['isadmin'])
    returnError('AccessDenied');

$data = fromJson();

if ($data == null || !isset($_GET['id']) || $_GET['id'] != '1') { // cannot get id
    returnError('actNotExist');
}

//$act_id = $_GET['id'];
//$data->{'name'}, $data->{'description'}, $data->{'date'}...
// sql
// insert into...

returnError('actSuccess');


?>
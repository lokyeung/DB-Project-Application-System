<?php

require_once './common.inc.php';

if (!$is_login) {
    $message = array('err' => true, 'msg' => 'notLogin');
    returnJson($message);
}

if (!isset($_GET['id']) || $_GET['id'] != '1') { // cannot get id
    $message = array('err' => true, 'msg' => 'actNotExist');
    returnJson($message);
} else {
// please fetch by db2 query!!!!!
//fetch is the member in the enrollment record
    // fetch the activity detail
$activity_detail = array(
    'staff_id' => $staff_id,
    'contact_name' => $user['name'],
    'contact_mobile' => $user['mobile'],
    'type' => '1',
    'id' => '1',
    'name' => 'DN150502 Sevillanas Dance',
    'deadline' => '2015-05-06',
    'description' => 'Sevillanas are danced by couples of all ages and sexes during celebrations (fiestas or ferias), often by whole families and towns. Sevillana choreography is very stable and knowing it is very useful, since it is a festival dance. This is why those intending to dance flamenco usually start by learning sevillanas; they are easier to master and there are more occasions for practice and training.',
    'date' => array(
        '2015-05-15',
        '2015-05-22',
    ),
    'status' => 1,
    'enrolled' => false
);

returnJson($activity_detail);
}

exit($data);

?>
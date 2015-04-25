<?php

require_once './common.inc.php';

if (!$user['isadmin'])
    returnError('AccessDenied');

if (!isset($_GET['id']) || $_GET['id'] != '1') { // cannot get id
//    $message = array('err' => true, 'msg' => 'actNotExist');
    //exit($_GET['id']);
    returnError('actNotExist');
//    returnJson($message);
} else {
    // please fetch by db2 query!!!!!
    $data = fromJson();
    if ($data == null) {
        $activity_detail = array(
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
            'enrollable' => false
        );

        returnJson($activity_detail);
    } else {
        returnError('ActSuccess');
        //$act_id = $_GET['id'];
        //$data->{'name'}, $data->{'description'}, $data->{'date'}...
        // sql
        // insert into...
    }
}

?>
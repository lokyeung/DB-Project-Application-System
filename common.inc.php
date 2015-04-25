<?php

$is_login = true;

$staff_id = '123';

$user = array(
    'staff_id' => '123',
    'name' => 'Hin',
    'mobile' => '12345678',
    'is_admin' => true,
);

function returnError($message) {
    $message = array('err' => true, 'msg' => $message);
    returnJson($message);
}

function returnJson($data) {
    if (gettype($data) === "string")
        $data = array($data);
    exit(json_encode($data));
}


function fromJson() {
    $request_body = file_get_contents('php://input');
    $data = json_decode($request_body);
}

?>
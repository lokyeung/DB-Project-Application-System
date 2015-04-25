<?php

$is_login = true;

$staff_id = '123';

$user = array(
	'staff_id' => '123',
	'name' => 'Hin',
	'mobile' => '12345678',
	'is_admin' => true,
);

// Remember to change back the Relative Database, HostName, UID and PWD
$database = "Driver={IBM DB2 ODBC DRIVER};Database=c3029924;HOSTNAME=158.132.20.106;PORT=50000;PROTOCOL=TCPIP;UID=c3029924;PWD=913cdg5w;";
$conn = db2_connect($database, '', '');

// if ($conn) {
//     echo "Connection succeeded.\n";
//     // db2_close($conn);
// } else {
//     echo "Connection failed\n";
//     echo "db2_conn_errormsg = " . db2_conn_errormsg() . "\n";
//     echo "db2_conn_error = " . db2_conn_error() . "\n";
// }

function returnError($message) {
	$message = array('err' => true, 'msg' => $message);
	returnJson($message);
}

function returnJson($data) {
	if (gettype($data) === "string") {
		$data = array($data);
	}

	exit(json_encode($data));
}

function fromJson() {
	$request_body = file_get_contents('php://input');
	$data = json_decode($request_body);
}

?>
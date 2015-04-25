<?php
$conn_string = "DRIVER={IBM DB2 ODBC DRIVER};DATABASE=$database;".
  "HOSTNAME=$hostname;PORT=$port;PROTOCOL=TCPIP;UID=$user;PWD=$password;";
$conn = db2_connect($conn_string, '', '');

if ($conn) {
    echo "Connection succeeded.";
}
else {
    echo "Connection failed.";
}
?>
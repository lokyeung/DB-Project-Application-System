<?php

require_once './common.inc.php';

$actarray = array('login', 'logout', 'register', 'info');

if (!isset($_GET['act']) || !in_array($_GET['act'], $actarray)) {
    returnJson('actionNotExist');
}

$action = $_GET['act'];

if (in_array($action, array('logout'))) {
    if (!$is_login) {
        returnJson('notLogin');
    }
} else if (in_array($action, array('login', 'register'))) {
    if ($is_login) {
        returnJson('loginAlready');
    }
}

if ($action == 'login') {
    $data = fromJson();

    if ($request_body == null || !isset($data->{'staff_id'}) || !isset($data->{'password'})) { // do not have post
        returnJson('loginError');
    }

    if ($data->{'staff_id'} === '1' || $data->{'password'} === '1') { // please do checking from database
        returnJson('loginSuccess');
    }

    returnJson('loginError');
} else if ($action == 'logout') {
    unset($_COOKIE['staff_id']);
    unset($_COOKIE['password']);
    returnJson('logoutSuccess');
} else if ($action == 'register') {
    $data = fromJson();

    if ($data == null || !isset($data->{'staff_id'}) || !isset($data->{'password'})) { // do not have post //重未打曬
        returnJson('inputError');
    }

    // query goes here

    returnJson('registerSuccess');
} else if ($action == 'info') {
    returnJson($user);
}

?>
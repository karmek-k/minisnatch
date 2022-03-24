<?php

$client = [
    'ip' => $_SERVER['REMOTE_ADDR'],
    'userAgent' => $_SERVER['HTTP_USER_AGENT'],
    'time' => $_SERVER['REQUEST_TIME'],
];

// check if the IP address is valid
if (filter_var($client['ip'], FILTER_VALIDATE_IP) === FALSE) {
    die;
}

var_dump($client);
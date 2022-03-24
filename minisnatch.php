<?php

$ip = $_SERVER['REMOTE_ADDR'];

if (filter_var($ip, FILTER_VALIDATE_IP) === FALSE) {
    die;
}

echo 'Your IP address is ' . $ip;
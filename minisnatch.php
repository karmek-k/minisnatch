<?php

//
// CONFIG SECTION START
//

// The JSON file that contains collected data
$fileName = 'minisnatch.json';

// Where should the script redirect to
$redirectTo = 'https://gnu.org';

//
// CONFIG SECTION END
//

$client = [
    'ip' => $_SERVER['REMOTE_ADDR'],
    'userAgent' => $_SERVER['HTTP_USER_AGENT'],
    'time' => $_SERVER['REQUEST_TIME'],
];

// check if the IP address is valid
if (filter_var($client['ip'], FILTER_VALIDATE_IP) === FALSE) {
    die;
}

// save data to a json file
$data = [$client];

if ($fileContent = file_get_contents($fileName)) {
    $data = array_merge(json_decode($fileContent, true), $data);
}

file_put_contents($fileName, json_encode($data));

// redirect
header("Location: $redirectTo");

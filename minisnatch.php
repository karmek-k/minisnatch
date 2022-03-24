<?php

//
// CONFIG SECTION START
//

// The JSON file that contains collected data
$fileName = 'minisnatch.json';

// Should the file be human readable?
// (Setting this to false will decrease the file size)
$prettyPrint = true;

// Where should the script redirect to
$redirects = [
 // 'key' => 'link',
    'gnu' => 'https://gnu.org',
    'linux' => 'https://kernel.org/',
];

// If none of routes above match, the script will redirect there
$defaultRedirect = 'https://microsoft.com';

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

// check for query args
$key = $_GET['k'];
$redirectTo = isset($redirects[$key]) ? $redirects[$key] : $defaultRedirect;

// save data to a json file
// sanitize the query parameter first!
$jsonKey = isset($redirects[$key]) ? htmlspecialchars($key) : 'default';
$data = [$jsonKey => [$client]];

// if the file exists:
if ($fileContent = file_get_contents($fileName)) {
    $decodedFileContent = json_decode($fileContent, true);
    $existing = $decodedFileContent[$jsonKey];

    // was the key captured before?
    if (isset($existing)) {
        $decodedFileContent[$jsonKey] = array_merge($existing, $data[$jsonKey]);
    }
    
    $data = array_merge($data, $decodedFileContent);
} 

file_put_contents(
    $fileName, 
    json_encode($data, $prettyPrint ? JSON_PRETTY_PRINT : 0)
);

// redirect
header("Location: $redirectTo");

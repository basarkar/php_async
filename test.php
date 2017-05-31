<?php
/**
* Install guzzle: "composer require guzzlehttp/guzzle:~6.0"
**/
require 'vendor/autoload.php';
$client = new GuzzleHttp\Client();
echo "Starting\n";
echo "Requesting Async URL\n";
$promise = $client->requestAsync('GET', 'https://api.github.com/users/danielhanold');

$promise->then(function ($response) {
    $profile = json_decode($response->getBody(), true);
    // Do something with the profile.
    echo 'Got response from Async request! STATUS CODE: ' . $response->getStatusCode()."\n";
    print_R($profile);
});
echo "After Async Request\n";
$promise->wait();

<?php
require 'vendor/autoload.php';

$key = '';
$secret = '';
$token = '';
$userName = '';

// TODO: Figure this out
//['headers' => [ 'Authorization' => 'Discogs', 'token' => $token]]

$client = new GuzzleHttp\Client();

// https://api.discogs.com/database/users/{username}/collection/

// https://api.discogs.com/database/search
// 'q' => 'Nirvana',

$res = $client->request('GET',
                        'https://api.discogs.com/users/'.$userName.'/collection/folders/0/releases',
                        ['query' => ['token' => $token]]
                        );

echo '<pre>';
var_dump(json_decode($res->getBody(), true));
echo '</pre>';
?>

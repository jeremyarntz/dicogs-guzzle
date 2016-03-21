<?php
// load config variables
$configArray = parse_ini_file("config.ini");

require 'vendor/autoload.php';

// TODO: Figure this out
//['headers' => [ 'Authorization' => 'Discogs', 'token' => $token]]

$client = new GuzzleHttp\Client();

// https://api.discogs.com/database/search
// 'q' => 'Nirvana',

$res = $client->request('GET',
                        'https://api.discogs.com/users/'.$configArray['userName'].'/collection/folders/0/releases',
                        ['query' => ['token' => $configArray['token']]]
                        );

$data = json_decode($res->getBody(), true);

foreach ($data['releases'] AS $release) {
  echo $release['basic_information']['title'].'<br />';
}

// echo '<pre>';
// var_dump($data['releases']);
// echo '</pre>';
?>

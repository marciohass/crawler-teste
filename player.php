<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);   

require 'vendor/autoload.php';
require 'helper/functions.php';

use Guzzle\Http\Client as GuzzleHttpClient; 
use Guzzle\Http\Exception\ClientErrorResponseException;
use Symfony\Component\DomCrawler\Crawler;
use Symfony\Component\CssSelector;

$url = 'https://www.transfermarkt.com';
$uri = '/player/profil/spieler/'.$id;

$userAgent = 'Mozilla/5.0 (Windows NT 10.0)'
        . ' AppleWebKit/537.36 (KHTML, like Gecko)'
        . ' Chrome/48.0.2564.97'
        . ' Safari/537.36';
$headers = array('User-Agent' => $userAgent);

$client = new GuzzleHttpClient($url);
$request = $client->get($uri, $headers);

try {
    $response = $request->send();
    $body = $response->getBody(true);
} catch (ClientErrorResponseException $e) {
    $responseBody = $e->getResponse()->getBody(true);
    echo $responseBody;
}

//$crawler = new Crawler($body);
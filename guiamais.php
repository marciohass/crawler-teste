<?php

require "vendor/autoload.php";

use GuzzleHttp\Client;
use Sunra\PhpSimple\HtmlDomParser;

$client = new Client([
    "headers" => [
        'User-Agent' => 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/79.0.3945.130 Safari/537.36'
    ]
]);

$URL = "https://www.guiamais.com.br/encontre?searchbox=true&what=&where=S%C3%A3o+Paulo%2C+SP&page=2";

$html = $client->request("GET", $URL)->getBody();

$dom = HtmlDomParser::str_get_html($html);

foreach($dom->find('meta|itemprop=url') as $key => $link){
    echo $link->content.PHP_EOL;
    
}
#!/usr/bin/env php
<?php

require 'vendor/autoload.php';

use GuzzleHttp\Client;
use Pedr0diniz\BuscadorDeCursos\Buscador;
use Symfony\Component\DomCrawler\Crawler;

$client = new Client([
    'base_uri' => 'https://www.alura.com.br',
    'verify' => false // verify false disables ssl encryption checks that could lead to errors
]);

$crawler = new Crawler();
$buscador = new Buscador($client, $crawler);

$courses = $buscador->buscar('/cursos-online-programacao/php');
foreach ($courses as $course) {
    exibeMensagem($course);
}

<?php
use App\Controllers\PagesController;

require ('../vendor/autoload.php');

session_start();
date_default_timezone_set('Europe/Paris');
setlocale(LC_TIME, "fr_FR");

$app = new \Slim\App([
  'settings' => [
    'displayErrorDetails' => true
  ]
]);
require ('../app/Container.php');

$container = $app->getContainer();

// Middlewares
$app->add(new \App\Middlewares\FlashMiddleware($container->view->getEnvironment()));

// Accueil
$app->get('/',\App\Controllers\PagesController::class .':home')->setName('home');

//Series (SickRage)
  $app->get('/series/',\App\Controllers\SeriesController::class .':home')->setName('series');
  $app->get('/series[/{tvdbId:[0-9]+}[/]]',\App\Controllers\SeriesController::class .':serie')->setName('serie');

  //
  $app->get('/search[/{params:.*}]',\App\Controllers\SearchsController::class .':home')->setName('search');
  // Mettre en pause ou reprendre une serie
  $app->get('/series/{tvdbId:[0-9]+}/pause/{etat:[0-1]+}',\App\Controllers\SeriesController::class .':getPaused')->setName('paused');

  // Ajouter une serie
  $app->get('/series/{tvdbId:[0-9]+}/add',\App\Controllers\SeriesController::class .':getAdd')->setName('add');

  // Supprimer une serie
  $app->get('/series/{tvdbId:[0-9]+}/delete',\App\Controllers\SeriesController::class .':getDelete')->setName('delete');

  $app->get('/series/{tvdbId}/{season}',\App\Controllers\SeriesController::class .':season')->setName('season');
  $app->get('/series/{tvdbId}/{season}/{episode}',\App\Controllers\SeriesController::class .':episode')->setName('episode');
// Films (CouchPotato)
$app->get('/movies/',\App\Controllers\MoviesController::class .':home')->setName('movies');
$app->run();

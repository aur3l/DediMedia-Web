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

// Middlewares
$app->add(new \App\Middlewares\FlashMiddleware($container->view->getEnvironment()));

// Accueil
$app->get('/',\App\Controllers\PagesController::class .':home')->setName('home');

// Accueil
$app->get('/404/',\App\Controllers\PagesController::class .':home')->setName('404');

// Rechercher une serie ou un film
$app->get('/search[/{id:.*}]',\App\Controllers\SearchsController::class .':home')->setName('search');

//Series (SickRage)
  $app->get('/tv/',\App\Controllers\TvController::class .':home')->setName('tvs');
  $app->get('/tv[/{tvdbId:[0-9]+}[/]]',\App\Controllers\TvController::class .':tv')->setName('tv');

  // Mettre en pause ou reprendre une serie
  $app->get('/tv/{tvdbId:[0-9]+}/pause/{etat:[0-1]+}',\App\Controllers\TvController::class .':getPaused')->setName('paused');

  // Ajouter une serie
  $app->get('/tv/{tvdbId:[0-9]+}/add',\App\Controllers\TvController::class .':getAdd')->setName('add');

  // Supprimer une serie
  $app->get('/tv/{tvdbId:[0-9]+}/delete',\App\Controllers\TvController::class .':getDelete')->setName('delete');

  $app->get('/tv/{tvdbId}/{season}',\App\Controllers\TvController::class .':season')->setName('season');
  $app->get('/tv/{tvdbId}/{season}/{episode}',\App\Controllers\TvController::class .':episode')->setName('episode');
// Films (CouchPotato)
$app->get('/movie/',\App\Controllers\MoviesController::class .':home')->setName('movies');
$app->run();

<?php
use Kryptonit3\SickRage\SickRage;
use Kryptonit3\CouchPotato\CouchPotato;
use Moinax\TvDb\Client;
use Intervention\Image\ImageManager;
use Slim\Flash\Messages;
use Tmdb\ApiToken;
use ColorThief\ColorThief;

$container = $app->getContainer();

$container['view'] = function ($container) {
    $dir = dirname(__DIR__);
    $view = new \Slim\Views\Twig($dir.'/app/views', [
        'cache' => false, //$dir.'/public/tmp/cache',
        'debug' => true
    ]);

    $basePath = rtrim(str_ireplace('index.php', '', $container['request']->getUri()->getBasePath()), '/');
    $view->addExtension(new Slim\Views\TwigExtension($container['router'], $basePath));
    $view->addExtension(new Twig_Extension_Debug());
    $view->addExtension(new Twig_Extension_Text());
    $view->addExtension(new Knlv\Slim\Views\TwigMessages(
      new Slim\Flash\Messages()
    ));

    return $view;
};

$container['sickrage'] = function ($container){
  $sickrage = new SickRage('http://sickrage.aur3l.fr','ab5f90bbefe423f16cfa4939970a2169');
  return $sickrage;
};

$container['configdefault'] = function($container){
  $data = parse_ini_file("config.ini",true,INI_SCANNER_RAW);
  return $data;
};

$container['couchpotato'] = function ($container){
  $couchpotato = new CouchPotato('http://couchpotato.aur3l.fr','972fffdca1d44f9aa8cbce7427282c6b');
  return $couchpotato;
};

$container['tvdb'] = function ($container){
  $tvdb = new Client('http://thetvdb.com','C3ECC3508C662A92');
  return $tvdb;
};

$container['tmdb'] = function ($container){
  $token  = new \Tmdb\ApiToken('ffc0856c7d4f5698c42353259ab108be');
  $tmdb   = new \Tmdb\Client($token);
  return $tmdb;
};

$container['resize'] = function ($container){
  $resize = new ImageManager();
  return $resize;
};
$container['sizes'] = function ($container){
  $sizes = [
    'small'  => '200',
    'medium' => '500',
    'big'    => '1000'
  ];
  return $sizes;
};

$container['flash'] = function ($container) {
    return new \Slim\Flash\Messages();
};

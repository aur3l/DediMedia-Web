<?php
namespace App\Controllers;
use ColorThief\ColorThief;

class MoviesController extends Controller {

  function home($request,$response){

    $data = $this->container->tmdb->getMoviesApi()->getMovie(330459, array('language' => 'fr'));


    //http://image.tmdb.org/t/p/w1000//mcwCNjqKUkebvknFkpj0UPdpSj.jpg
    die();
    $data = [];
    $data['movies'] = json_decode($this->container->couchpotato->getMediaList(), true);
    $this->render($response,'movies/home.twig', $data['movies']);
  }

}

?>

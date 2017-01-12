<?php
namespace App\Controllers;

class MoviesController extends Controller {

  function home($request,$response){
    $data = [];
    $data['movies'] = json_decode($this->container->couchpotato->getMediaList(), true);
    $this->render($response,'movies/home.twig', $data['movies']);
  }

}

?>

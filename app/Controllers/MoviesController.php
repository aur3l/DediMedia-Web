<?php
namespace App\Controllers;
use ColorThief\ColorThief;

class MoviesController extends Controller {

  function home($request,$response){
    // On récupére l'id de TmDb grace a l'id de TvDb par parametre GET et on le renvoit.
    $id = $this->container->tmdb->getFindApi()->findBy($request->getParam('id'), [
      'external_source' => 'tvdb_id'
    ]);
    $id = $id['tv_results']['0']['id'];

    // On récupére les infos de la série.
    $data = $this->container->tmdb->getTvApi()->getTvshow($id, array('language' => 'fr'));

    // On coupé le tableau afin d'y integrer les episodes.
    foreach ($data['seasons'] as $key => $value) {
          $data['seasons'][$key] = $this->container->tmdb->getTvSeasonApi()->getSeason($id, $value['season_number']);
    }

    //http://image.tmdb.org/t/p/w1000//mcwCNjqKUkebvknFkpj0UPdpSj.jpg
    echo "<pre>";
      print_r($data);
    echo "</pre>";
    die();
    $data = [];
    $data['movies'] = json_decode($this->container->couchpotato->getMediaList(), true);
    $this->render($response,'movies/home.twig', $data['movies']);
  }

}

?>

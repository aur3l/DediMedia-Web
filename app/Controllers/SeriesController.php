<?php
namespace App\Controllers;
use ColorThief\ColorThief;

class SeriesController extends Controller {

  function home($request,$response){
    $data = [];
    $series = json_decode($this->container->sickrage->shows('name'), true);
    $data['series'] = $series['data'];
    $dir = dirname(__DIR__, 2);
    foreach ($data['series'] as $key => $val) {
          $data['series'][$key]['banner'] = $this->multiRezise($this->container->sickrage->showGetPoster($val['tvdbid']), $val['tvdbid'], "tmp/covers",['small']);
    }
    $this->render($response, 'series/home.twig',$data);
  }

  function searchSeries($request,$response, $args = []){
    $data = $this->container->tvdb->getSeries($request->getParam('term'));
    $array = [];
    foreach ($data as $key => $value ){
      $vals = get_object_vars($value);
      $array[] = array(
        'id' => $vals['id'],
        'value' => $vals['name'],
        'type' => "series"
      );;
    }
    /*echo "<pre>";
    print_r($array);
    echo "</pre>";
    die();*/
    return  $response->withJson($array);
  }

  function serie($request,$response, $args = []){
    // On récupére l'id de TmDb grace a l'id de TvDb par parametre GET et on le renvoit.
    $id = $this->container->tmdb->getFindApi()->findBy($args['tvdbId'], [
      'external_source' => 'tvdb_id'
    ]);
    $id = $id['tv_results']['0']['id'];

    // On récupére les infos de la série.
    $data = $this->container->tmdb->getTvApi()->getTvshow($id, array('language' => 'fr'));

    // On coupé le tableau afin d'y integrer les episodes et au sauvegarde les pochettes des saisons en format small.
    foreach ($data['seasons'] as $key => $value) {
      // On récupére les episodes des saisons avec l'id et le numéro de la saison.
      $data['seasons'][$key] = $this->container->tmdb->getTvSeasonApi()->getSeason($id, $value['season_number']);

      // On sauvegarde la pochette de la serie en question.
      $nameposter = "http://image.tmdb.org/t/p/w1000".$value['poster_path'];
      $poster_path = $this->multiRezise($nameposter, $args['tvdbId'], "tmp/covers",['small'],'_S'.$value['season_number']);
      $data['seasons'][$key]['poster_path'] = $poster_path;
    }

    $nameposter = "http://image.tmdb.org/t/p/w1000".$data['poster_path'];
    $data['poster_path'] = $this->multiRezise($nameposter, $args['tvdbId'], "tmp/covers",['small']);
    $ColorThief = ColorThief::getPalette($nameposter, 2,10);

    foreach ($ColorThief as $key => $rgb) {
      $data['palette'][$key] = $this->rgb2hex($rgb);
    }

    $this->getArray($data);

    $this->render($response, 'series/serie.twig',$data);
  }

  function episode($request,$response, $args){
    $data = [];
    $data['episode'] = json_decode($this->container->sickrage->shows('name'), true);
    $this->render($response, 'series/episode.twig',$data);
  }

  function getPaused($request,$response, $args){
    if($this->container->sickrage->showPause($args['tvdbId'],$args['etat'])){
      $this->container->flash->addMessage('Flash', ($args['etat'] == 0) ? "La recherche des nouveaux épisodes reprend." : "La recherhe des nouveaux épisodes a été stopée.","warning");
    }
    return $this->redirect($response, 'serie', $args);
  }

  function getAdd($request,$response, $args){
    if($this->container->sickrage->showAddNew($args['tvdbId'])){
      $this->container->flash->addMessage('Flash', "La série est en cours d'ajout.");
    }
    return $this->redirect($response, 'serie', $args);
  }

  function getDelete($request,$response, $args){
    if($this->container->sickrage->showDelete($args['tvdbId'])){
      $this->container->flash->addMessage('Flash', "La série est en cours de suppression.");
    }
    return $this->redirect($response, 'serie', $args);
  }

}

?>

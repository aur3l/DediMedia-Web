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
    $data = [];
    $image = $this->container->sickrage->showGetPoster($args['tvdbId']);
    $data['palette'] = ColorThief::getPalette($image, 1);
    $serie =  json_decode($this->container->sickrage->show($args['tvdbId']), true);
    $data['serie']   = $serie['data'];
    $data['listseasons'] = json_decode($this->container->sickrage->showSeasons($args['tvdbId']));
    $data['tvdb'] = $this->ReverseArray($this->container->tvdb->getSerieEpisodes($args['tvdbId'], "fr"));
    $data['config'] = $this->container->configdefault;
    foreach ($data['tvdb']['episodes'] as $numS => $season) {
      foreach ($season as $numE => $ep) {
        $ep = get_object_vars($ep);
        //print_r($this->container->sickrage->episode($args['tvdbId'], $ep['season'], $ep['number'])); die();
        $data['tvdb']['episodes'][$numS][$numE]->status = $this->container->sickrage->episode($args['tvdbId'], $ep['season'], $ep['number']);
      ;
      }
    }

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

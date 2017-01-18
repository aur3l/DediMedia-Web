<?php
namespace App\Controllers;
use ColorThief\ColorThief;
use Tmdb\Exception\TmdbApiException;

class TvController extends Controller {

  function home($request,$response){
    $data = [];
    $tvs = json_decode($this->container->sickrage->shows('name'), true);
    $data['tvs'] = $tvs['data'];
    foreach ($data['tvs'] as $key => $val) {
          $stats = json_decode($this->container->sickrage->showStats($val['tvdbid']));
          $data['tvs'][$key]['stats'] = json_decode(json_encode($stats->data), true);
          $data['tvs'][$key]['banner'] = $this->multiRezise($this->container->sickrage->showGetPoster($val['tvdbid']), $val['tvdbid'], "tmp/covers",['small']);
    }
    $this->render($response, 'tv/home.twig',$data);
  }

  function tv($request,$response, $args = []){
    $data = [];
    $id   = $args['tvdbId'];

    $data = $this->container->tvdb->getSerie($id);
    $data = $this->ObjecttoArray($data);
    $seasons = json_decode($this->container->sickrage->showSeasons($id), true);
    $data['seasons'] = $seasons['data'];
    foreach ($data['seasons'] as $numS => $season) {
      foreach ($season as $numE => $episode) {
        $episode = $this->container->tvdb->getEpisode($id, $numS, $numE);
        $episode = $this->ObjecttoArray($episode);
        $data['seasons'][$numS][$numE]['info'] = $episode;
      }
    }
    $poster = $this->container->tvdb->getBannersFiltered($id, "poster");
    $nameposter = "http://thetvdb.com/banners/".$poster[0]->path;
    $data['banner'] = $this->multiRezise($nameposter, $id, "tmp/covers",['small']);
    $data['palette'] = ColorThief::getPalette($nameposter, 2);
    $this->getArray($data);
    $this->render($response, 'tv/tv.twig',$data);
  }

  function episode($request,$response, $args){
    $data = [];
    $data['episode'] = json_decode($this->container->sickrage->shows('name'), true);
    $this->render($response, 'tv/episode.twig',$data);
  }

  function getPaused($request,$response, $args){
    if($this->container->sickrage->showPause($args['tvdbId'],$args['etat'])){
      $this->container->flash->addMessage('Flash', ($args['etat'] == 0) ? "La recherche des nouveaux épisodes reprend." : "La recherhe des nouveaux épisodes a été stopée.","warning");
    }
    return $this->redirect($response, 'tv', $args);
  }

  function getAdd($request,$response, $args){
    if($this->container->sickrage->showAddNew($args['tvdbId'])){
      $this->container->flash->addMessage('Flash', "La série est en cours d'ajout.");
    }
    return $this->redirect($response, 'tv', $args);
  }

  function getDelete($request,$response, $args){
    if($this->container->sickrage->showDelete($args['tvdbId'])){
      $this->container->flash->addMessage('Flash', "La série est en cours de suppression.");
    }
    return $this->redirect($response, 'tv', $args);
  }

}

?>

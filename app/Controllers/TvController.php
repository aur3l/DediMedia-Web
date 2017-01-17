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
    try {
      // On récupére l'id de TmDb grace a l'id de TvDb par parametre GET et on le renvoit.
      $TvDbid = $this->container->tmdb->getFindApi()->findBy($args['tvdbId'], [
        'external_source' => 'tvdb_id'
      ]);

      if($TvDbid['tv_episode_results'] != null) { $id = $args['tvdbId']; } else { $id = $TvDbid['tv_results']['0']['id']; }

      // On récupére les infos de la série.
      $data = $this->container->tmdb->getTvApi()->getTvshow($id, array('language' => 'fr'));

      // On coupé le tableau afin d'y integrer les episodes et au sauvegarde les pochettes des saisons en format small.
      foreach ($data['seasons'] as $key => $value) {
        // On récupére les episodes des saisons avec l'id et le numéro de la saison.
        //$data['seasons'][$key] = $this->container->tmdb->getTvSeasonApi()->getSeason($id, $value['season_number']);
      }

      $nameposter = "http://image.tmdb.org/t/p/w1000".$data['poster_path'];
      $data['poster_path'] = $this->multiRezise($nameposter, $args['tvdbId'], "tmp/covers",['small']);
      $ColorThief = ColorThief::getPalette($nameposter, 2,10);

      foreach ($ColorThief as $key => $rgb) {
        $data['palette'][$key] = $this->rgb2hex($rgb);
      }

      $this->getArray($data);
      $this->render($response, 'tv/serie.twig',$data);

    } catch (TmdbApiException $e) {
        if (TmdbApiException::STATUS_RESOURCE_NOT_FOUND == $e->getCode()) {
            $message = 'Cette série n\'existe pas.';
            $this->container->flash->addMessage('Flash', $message, "danger");
            return $this->redirect($response,"home", 302);
        }
    }
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

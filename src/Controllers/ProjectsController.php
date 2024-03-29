<?php namespace Albreis\KurinProjectManager\Controllers;

use Albreis\Kurin\Controllers\AbstractController;
use Albreis\Kurin\Traits\Cache;
use Albreis\Kurin\Traits\InformationExtractor;
use Albreis\Kurin\Traits\ObjectManager;
use Albreis\Kurin\Traits\Request;
use Albreis\Kurin\Traits\Response;
use Albreis\KurinProjectManager\Repositories\ProjectsRepository;
use Exception;

/** @package Albreis\Kurin\Controllers */
class ProjectsController extends AbstractController {

  use InformationExtractor;

  function index() {
    $cache = Cache::file(md5(Request::uri()), 60, function () {
      $projects = new ProjectsRepository;
      $limit = Request::inputJson('limit', 20);
      $offset = Request::inputJson('offset', 0);
      try {
        $result = $projects->getAll($limit, $offset);   
      }catch(Exception $e) {
        $result = $e->getMessage();
      }  
      return Response::json($result);
    });

    echo $cache;
  }
  function deleteds() {
    $cache = Cache::file(md5(Request::uri()), 60, function () {
      $projects = new ProjectsRepository;
      $limit = Request::inputJson('limit', 20);
      $offset = Request::inputJson('offset', 0);
      try {
        $result = $projects->getDeleted($limit, $offset);   
      } catch(Exception $e) {
        $result = $e->getMessage();
      }
      return Response::json($result);
    });

    echo $cache;
  }

  public function view(int $project_id) {

    $cache = Cache::file(md5(Request::uri()), 60, function () use ($project_id) {
      $repository = new ProjectsRepository;
      $result = $repository->getProjectById($project_id);
      return Response::json([
        'name' => self::getObjectAttribute($result, 'name')
      ]);
    });

    echo $cache;
  }
}
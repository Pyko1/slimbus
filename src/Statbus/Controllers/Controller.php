<?php

namespace Statbus\Controllers;

use Psr\Container\ContainerInterface;

class Controller {

  protected $container;
  protected $view;
  protected $DB;
  protected $router;
  protected $settings;

  public $page = 1;
  public $pages = 0;
  public $per_page = 60;

  public $breadcrumbs = [];
  public $ogdata = [];

  public function __construct(ContainerInterface $container) {
    $this->container = $container;
    $this->view = $this->container->get('view');
    $this->DB = $this->container->get('DB');
    $this->router = $this->container->get('router');
    $this->request = $this->container->get('request');
    $this->response = $this->container->get('response');
    $this->ogdata = [
      'site_name' => $this->container->get('settings')['statbus']['app_name'],
      'url'       => $this->request->getUri()->getBaseUrl().$this->router->pathFor('statbus'),
      'type'      => 'object',
    ];
    $this->view->getEnvironment()->addGlobal('ogdata', $this->ogdata);
  }

  public function getFullURL($path){
    $base = trim($this->request->getUri()->getBaseUrl(), '/');
    return $base.$path;
  }
}


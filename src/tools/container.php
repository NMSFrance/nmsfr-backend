<?php

/**
 * Created by PhpStorm.
 * User: gay_k
 * Date: 01/08/2016
 * Time: 22:31
 */
class Container
{
  /**
   * @var array
   */
  private $container;

  public function __construct()
  {
    $this->container = $app->getContainer();

    return $this;
  }

  public function getContainer($name)
  {
     return isset($this->container[$name]) ? $this->container[$name] : null;
  }
}
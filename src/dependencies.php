<?php
// DIC configuration
$container = $app->getContainer();

// monolog
$container['logger'] = function ($c) {
  $settings = $c->get('settings')['logger'];
  $logger = new Monolog\Logger($settings['name']);
  $logger->pushProcessor(new Monolog\Processor\UidProcessor());
  $logger->pushHandler(new Monolog\Handler\StreamHandler($settings['path'], Monolog\Logger::DEBUG));
  return $logger;
};

// Service factory for the ORM
$container['db'] = function ($container) {
  $capsule = new \Illuminate\Database\Capsule\Manager;
  $capsule->addConnection($container['settings']['db']);

  $capsule->setAsGlobal();
  $capsule->bootEloquent();

  return $capsule;
};

$container['Publication'] = function($c) {
  return new \Publication($c);
};

$container['Picture'] = function($c) {
  return new \Picture($c);
};

$container['Like'] = function($c) {
  return new \Like($c);
};

$container['User'] = function($c) {
  return new \User($c);
};

$container['File'] = function($c) {
  return new \File($c);
};

?>

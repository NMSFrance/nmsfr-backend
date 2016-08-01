<?php
return [
  'settings' => [
    'displayErrorDetails' => true, // set to false in production
    'addContentLengthHeader' => false, // Allow the web server to send the content-length header

    // Renderer settings
    'renderer' => [
      'template_path' => __DIR__ . '/../templates/',
    ],

    // Monolog settings
    'logger' => [
      'name' => 'slim-app',
      'path' => __DIR__ . '/../logs/app.log',
    ],

    'determineRouteBeforeAppMiddleware' => false,
    // Eloquent Configuration DataBase
    'db' => [
      'driver' => 'mysql',
      'host' => 'localhost',
      'database' => 'nmsfrance',
      'username' => 'root',
      'password' => 'root',
      'charset'   => 'utf8',
      'collation' => 'utf8_unicode_ci',
      'prefix'    => '',
    ],
    //Set path to Full picture
    'fullPath' => '/tmp/full/',
    //Set path to Thumbnail picture
    'thumbPath' => '/tmp/thumbnail/'
  ],
];
?>

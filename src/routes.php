<?php
// Routes

  $app->get('/[{name}]', function ($request, $response, $args) {
    // Sample log message
    $this->logger->info("Slim-Skeleton '/' route");

    $data = array('message' => 'Hello World', 'time' => time());
    return $response->withJson($data, 200);
  });
?>

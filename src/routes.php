<?php
// Routes

  $app->get('/{name}', function ($request, $response, $args) {
    // Sample log message
    $this->logger->info("Slim-Skeleton '/' route");
    $name = $request->getAttribute('name');
    $data = array('message' => "Hello, $name", 'time' => time());
    return $response->withJson($data, 200);
  });
?>

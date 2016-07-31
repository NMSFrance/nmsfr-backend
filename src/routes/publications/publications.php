<?php
/**
 * Created by PhpStorm.
 * User: gay_k
 * Date: 31/07/2016
 * Time: 21:48
 */

// Post the publication
$app->post('/publications', function ($request, $response, $args) {
    $data = array('message' => "true", 'time' => time());
    return $response->withJson($data, 200);
});

// Get publication with special parameters
$app->get('/publications', function ($request, $response, $args) {
    $data = array('message' => "true", 'time' => time());
    return $response->withJson($data, 200);
});
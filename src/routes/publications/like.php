<?php

/**
 * Created by PhpStorm.
 * User: gay_k
 * Date: 04/08/16
 * Time: 13:17
 */

// Auth Required Like Publication
$app->post('/likes/{publicationId}', 'Like:like');
// Auth Required Like Publication
$app->delete('/likes/{userId}/{publicationId}', 'Like:dislike');

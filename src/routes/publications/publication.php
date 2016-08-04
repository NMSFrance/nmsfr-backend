<?php
/**
 * Created by PhpStorm.
 * User: gay_k
 * Date: 31/07/2016
 * Time: 21:22
 */

// Get the publication from ID
$app->get('/publications/{id}', 'Publication:get');

?>
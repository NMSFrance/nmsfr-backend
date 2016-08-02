<?php
/**
 * Created by PhpStorm.
 * User: gay_k
 * Date: 02/08/2016
 * Time: 22:19
 */

// Show the picture from fileName
$app->get('/picture/{fileName}', 'Picture:show');

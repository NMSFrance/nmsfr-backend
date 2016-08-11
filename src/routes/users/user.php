<?php

$app->post('/users', 'User:create');
$app->post('/users/login', 'User:login');

<?php

//put all urls in here

$urlpatterns = [
    '/' => ['controller' => 'home', 'action' => 'index'],
    'home/'=> ['controller' => 'home'],
    'register/' => ['controller' => 'users', 'action' => 'register'],
    'login/' => ['controller' => 'users', 'action' => 'login'],
    'logout/' => ['controller' => 'users', 'action' => 'logout'],
    'articles/{id:\d+}/' => ['controller' => 'articles', 'action' => 'show'],
    'articles/{id:\d+}/comment/add/' => ['controller' => 'articles', 'action' => 'addComment'],
    'category/{categoryname:[a-zA-Z-]+}/' => ['controller' => 'articles', 'action' => 'categoryView'],
    'profile/{categoryname:[a-zA-Z-]+}/' => ['controller' => 'users', 'action' => 'showProfile'],
    '{controller}/{action}/' => [],
    '{controller}/' => [],
    '{controller}/{id:\d+}/{action}/' => [],
];

?>
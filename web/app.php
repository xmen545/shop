<?php

use Symfony\Component\Debug\Debug;
use Symfony\Component\HttpFoundation\Request;


require __DIR__.'/../vendor/autoload.php';
Debug::enable();

// создает ядро
$kernel = new AppKernel('dev', true);


if (PHP_VERSION_ID < 70000) {
    $kernel->loadClassCache();
}

// создает класс ЗАПРОС 
$request = Request::createFromGlobals();

// Создает класс ОТВЕТ после отработки роутера и контролера
$response = $kernel->handle($request);

// отправляет запрос пользователю
$response->send();

$kernel->terminate($request, $response);

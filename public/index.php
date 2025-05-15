<?php
require_once __DIR__ . '/../bootstrap/bootstrap.php';
require_once __DIR__ . '/../app/Http/Controllers/IndexController.php';
require_once __DIR__ . '/../app/Core/ErrorHandler.php';

use App\Core\Request;
use App\Core\ErrorHandler;
use App\Http\Controllers\IndexController;

try{
$request = new request();
(new IndexController())->index();
}catch(Throwable $e){
    ErrorHandler::handle($e);
}
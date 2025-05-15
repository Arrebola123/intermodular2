<?php   
require_once __DIR__ . '/../bootstrap/bootstrap.php';
require_once __DIR__ . '/../app/Http/Controllers/IndexController.php';
require_once __DIR__ . '/../app/Core/ErrorHandler.php';

use App\Core\ErrorHandler;
use App\Core\Request;
use App\Http\Controllers\IndexController;

$request = new Request();
try{
    (new IndexController())->indexMarca($request->id);
}catch(Exception $e){
    ErrorHandler::handle($e);
}



 
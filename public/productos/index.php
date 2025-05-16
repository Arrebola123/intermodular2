<?php   
require_once __DIR__ . '/../../bootstrap/bootstrap.php';
require_once __DIR__ . '/../../app/Http/Controllers/ProductoController.php';

use App\Core\ErrorHandler;
use App\Core\Request;
use App\Http\Controllers\ProductoController;

try{
    (new ProductoController())->index();
}catch(Exception $e){
    ErrorHandler::handle($e);
}



 
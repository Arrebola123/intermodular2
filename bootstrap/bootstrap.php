<?php

// Configuración
require_once __DIR__ . '/../config/config.php';
require_once __DIR__ . '/../config/db.php';

// Nucleo
require_once __DIR__ . '/../app/Core/Auth.php';
require_once __DIR__ . '/../app/Core/DB.php';
require_once __DIR__ . '/../app/Core/Cart.php';
require_once __DIR__ . '/../app/Core/helpers.php';
require_once __DIR__ . '/../app/Core/Model.php';
require_once __DIR__ . '/../app/Core/QueryBuilder.php';
require_once __DIR__ . '/../app/Core/Session.php';
require_once __DIR__ . '/../app/Core/Request.php';
require_once __DIR__ . '/../app/Core/Response.php';

// Interfaces
require_once __DIR__ . '/../app/Contracts/Stockeable.php';

// Modelos (Mejor en los scripts donde se necesiten. Se importan aquí por comodidad)
require_once __DIR__ . '/../app/Models/Usuario.php';
require_once __DIR__ . '/../app/Models/Marca.php';
require_once __DIR__ . '/../app/Models/Proveedor.php';
require_once __DIR__ . '/../app/Models/Producto.php';
require_once __DIR__ . '/../app/Models/Pedido.php';
require_once __DIR__ . '/../app/Models/Categoria.php';

// Inicio de sesión (siempre después de cargar el modelo Usuario)
session();
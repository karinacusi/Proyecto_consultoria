<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index'); // Página principal (login)
$routes->post('/login', 'AuthController::login'); // Procesar login
$routes->get('/logout', 'AuthController::logout'); // Procesar logout

// Rutas diferenciadas por roles
$routes->get('/inicio', 'UsuarioController::dashboard'); // Vista para operadores
$routes->get('/admin', 'AdminController::dashboard');  // Vista para administradores

// Rutas para la gestión de números de celular
$routes->post('inicio/consultarNumero', 'NumeroController::consultar'); // Consultar número de celular
$routes->post('inicio/asociarNumero', 'NumeroController::asociar'); // Asociar número a un usuario

// Rutas para la integración con servicios externos
$routes->post('admin/validarDNI', 'APIController::validarDNI'); // Validar DNI mediante API externa
$routes->post('admin/consultarOperador', 'APIController::consultarOperador'); // Consultar operador de un número

// Rutas de comunicación en tiempo real (chat)
$routes->get('/chat', 'ChatController::index'); // Vista del chat
$routes->post('/chat/enviarMensaje', 'ChatController::enviarMensaje'); // Enviar mensaje
$routes->get('/chat/obtenerMensajes', 'ChatController::obtenerMensajes'); // Obtener mensajes en tiempo real


// Ruta de acceso denegado
$routes->get('/no_permission', 'AuthController::noPermission'); 

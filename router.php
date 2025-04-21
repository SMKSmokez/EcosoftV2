<?php
// Define the available routes
$routes = [
    '/' => 'Controllers/index.php',
    '/Home' => 'Controllers/index.php',
    '/About' => 'Controllers/about.php',
    '/Products' => 'Controllers/products.php',
    '/Survey' => 'Controllers/survey.php',
];

// Get the route from the query string (or default to '/')
$route = isset($_GET['route']) && !empty($_GET['route']) ? $_GET['route'] : '/';

// Check if the route exists in the available routes
if (array_key_exists($route, $routes)) {
    require $routes[$route];
} else {
    abort();
}

function routeToController ($route, $routes) {
    if (array_key_exists($route, $routes)) {
        require $routes[$route];
    } else {
        abort();
    }
}

routeToController($route, $routes);
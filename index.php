<?php 

require "func.php";

$routes = [
    '/' => 'Controllers/index.php',
    '/index' => 'Controllers/index.php',
    '/products' => 'Controllers/products.php',
    '/about' => 'Controllers/about.php',
    '/survey' => 'Controllers/survey.php',
];

$uri = parse_url($_SERVER['REQUEST_URI'])['path'];

$basePath = rtrim(dirname($_SERVER['SCRIPT_NAME']), '/\\');

if ($basePath && strpos($uri, $basePath) === 0) {
    $uri = substr($uri, strlen($basePath));
    $uri = ($uri === '' || $uri === '/') ? '' : $uri;
}

$uri = $uri ? '/' . ltrim(rtrim($uri, '/'), '/') : '/';

file_put_contents('debug.log', 
    "SCRIPT_NAME: {$_SERVER['SCRIPT_NAME']}\n" .
    "Raw REQUEST_URI: {$_SERVER['REQUEST_URI']}\n" .
    "Parsed URI: $uri\n" .
    "Base Path: $basePath\n" .
    "Available Routes: " . print_r(array_keys($routes), true) . "\n" .
    "----------------------------------------\n",
    FILE_APPEND
);

// Check if the URI exists in routes
if (array_key_exists($uri, $routes)) {
    require $routes[$uri];
} else {
    http_response_code(404);
    echo "Page Not Found: $uri";
    die();
}
?>
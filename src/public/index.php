<?php

use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;

require __DIR__ . '/../vendor/autoload.php';

$config['displayErrorDetails'] = true;
$config['db']['host']   = "localhost";
$config['db']['user']   = "root";
$config['db']['pass']   = "root";
$config['db']['dbname'] = "fastorder";


$app = new \Slim\App(["settings" => $config]);
$container = $app->getContainer();

$loader = new \Twig\Loader\FilesystemLoader('../templates/');
$container['twig'] = new \Twig\Environment($loader,[
    'debug' => true
]);
$container['twig']->addExtension(new \Twig\Extension\DebugExtension());

$container['logger'] = function($c) {
    $logger = new \Monolog\Logger('my_logger');
    $file_handler = new \Monolog\Handler\StreamHandler("../logs/app.log");
    $logger->pushHandler($file_handler);
    return $logger;
};

$container['db'] = function ($c) {
    $db = $c['settings']['db'];
    $pdo = new PDO("mysql:host=" . $db['host'] . ";dbname=" . $db['dbname'],
        $db['user'], $db['pass']);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
    return $pdo;
};

// Home Page Route
$app->get('/', function (Request $request, Response $response) {
    $catMapper = new CategoryMapper($this->db);
    $categories = $catMapper->getCategories();

    $prodMapper = new ProductMapper($this->db);
    $products = $prodMapper->getProducts();

    $currencyMapper = new CurrencyMapper($this->db);
    $currecies = $currencyMapper->getCurrency();

    $template = $this->twig->load('index.html');
    echo $template->render(["categories" => $categories, "products" => $products, "currecies" => $currecies]);
});

// Product List Page Route
$app->get('/products', function (Request $request, Response $response) {
    $category =$_GET['category'];
    $sort =$_GET['sort'];

    $catMapper = new CategoryMapper($this->db);
    $categories = $catMapper->getCategories();

    $prodMapper = new ProductMapper($this->db);
    $products = $prodMapper->getProductByfilter($category, $sort);

    $currencyMapper = new CurrencyMapper($this->db);
    $currecies = $currencyMapper->getCurrency();

    $template = $this->twig->load('index.html');
    echo $template->render(["categories" => $categories, "products" => $products, "currecies" => $currecies, 'getCat' => $category, 'getSort' => $sort]);
});

// Product By Category Route
$app->get('/category/{id}', function (Request $request, Response $response, $args) {
    $category_id = (int)$args['id'];

    $catMapper = new CategoryMapper($this->db);
    $categories = $catMapper->getCategories();

    $prodMapper = new ProductMapper($this->db);
    $products = $prodMapper->getProductById($category_id);

    $template = $this->twig->load('index.html');
    echo $template->render(["categories" => $categories, "products" => $products]);
});

$app->run();

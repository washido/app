<?php
session_start();
require_once 'Slim/Slim.php';
require_once 'protected/models/Items.php';
require_once 'protected/models/User.php';
require_once 'protected/models/Mongodbclass.php';

define('MONGODB_USER', 'admin');
define('MONGODB_PASS', 'Senacrs987');
define('MONGODB_DB', 'washido');
define('MONGODB_HOST', '104.131.3.222');
define('MONGODB_PORT', '27017');

\Slim\Slim::registerAutoloader();
$app = new \Slim\Slim(array(
    'debug' => true,
    'templates.path' => 'templates'
));


/**
 * Página inicial
 */
$app->get('/', function() use ($app){
    $app->render('home.php');
});

/**
 * Aplicação
 */
$app->group('/app', function() use ($app){

    /**
     * 
     */
    $app->get('/auth', function() use($app){
        echo 'oi';
    });

    $app->post('/movies', function() use($app){
        if ( isset($_POST['movies']) ) 
        {
            $Items = new Items('movies');
            $User  = new User;

            $Items->setItems($_POST['movies']);
            $User->setMovies($Items);
            $User->setId($_POST['userID']);
            $User->save();
        }
        else
        {
            $app->halt(400);
        }
    });

});

/**
 * Páginas Institucionais:
 * - Quem Somos
 * - Sobre
 * - Contato
 */
$app->get('/quem-somos', function() use ($app){
    $app->render('quem-somos.php');
});

$app->get('/sobre', function() use ($app){
    $app->render('sobre.php');
});

$app->get('/contato', function() use ($app){
    $app->render('contato.php');
});


$app->run();
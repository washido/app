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
     * Efetua importação dos dados
     */
    $app->post('/import', function() use($app){
        if ( isset($_POST['userID']) ) 
        {
            /* Por enquanto apenas filmes */
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

    /**
     * Recomenda um filme para o usuário
     */
    $app->post('/recommend', function() use ($app){
    
        $Mongo        = Mongodbclass::conn();
        $maisProximos = array();
        $userID       = $_POST['userID'];
        
        /* Busca os dados do usuário logado */
        $user   = $Mongo->findOne(array('_id' => $userID));
        
        /* Busca todos os outros usuários do sistema */
        $users  = $Mongo->find(array("_id" => array('$ne' => $userID)));
    
        /* Percorre todos os usuários e encontra o mais próximo */
        foreach ($users as $u):
            
            $intersect = sizeof( array_intersect( $u['movies'], $user['movies'] ) );
            $union     = sizeof( array_unique( array_merge( $u['movies'], $user['movies'] ) ) );
            $res       = $intersect / $union;
            $maisProximos[$u['_id']] = $res;
            
        endforeach;

        /* Ordena o array de mais próximos */
        asort($maisProximos);
        
        /* Posiciona o cursor no ultimo elemento */
        end($maisProximos);
        
        /* Pega o indice da ultima posição do array (uid) */
        $index = key($maisProximos);

        /* Procura o usuário mais próximo */
        $userProximo = $Mongo->findOne(array('_id' => (string)$index));

        /* Verifica quais filmes o usuário mais próximo possui que eu não */
        $diff = array_diff( $userProximo['movies'], $user['movies'] );

        echo json_encode(array('items' => $diff, 'success' => true));

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
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
        $id    = isset($_POST['userID']) ? $_POST['userID'] : NULL;
        $type  = isset($_POST['type'])   ? $_POST['type']   : NULL;
        $items = isset($_POST['items'])  ? $_POST['items']  : NULL;

        if ( $id !== NULL && is_array($items) && ( $type === Items::cMUSIC || $type === Items::cMOVIE || $type === Items::cBOOK) ) 
        {
            $_SESSION['id'] = $id;

            $Items = new Items($type);
            $Items->setItems($items);
            $Items->save();

            $User  = new User;
            $User->setItems($Items);
            $User->setId($id);
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
        $userID       = $_SESSION['id'];
        $type         = $_POST['type'];
        
        /* Busca os dados do usuário logado */
        $user   = $Mongo->findOne(array('_id' => $userID));
        
        /* Busca todos os outros usuários do sistema, mas apenas o tipo escolhido */
        $users  = $Mongo->find(
            array("_id" => array('$ne' => $userID), $type => array('$exists' => true)), 
            array($type => true)
        );
        
        /* Percorre todos os usuários e encontra o mais próximo */
        foreach ($users as $u):
            // print_r($u);
            $intersect = sizeof( array_intersect( $u[$type], $user[$type] ) );
            $union     = sizeof( array_unique( array_merge( $u[$type], $user[$type] ) ) );
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
        try {
            $diff   = array_diff( $userProximo[$type], $user[$type] );
            $Item   = Mongodbclass::conn($type);
            
            $i = $Item->find(
                array( "_id" =>  array('$in' => $diff ) )
            );

            $diff = array();
            foreach ($i as $value) {
                $diff[] = $value;
            }

            $return = json_encode(array('items' => $diff, 'success' => true));
            
        } catch (Exception $e) {
            $return = json_encode(array('items' => array(), 'success' => false));
        }
            
        echo $return;

    });

});

$app->get('/me(/:type)', function($type = null) use ($app){
    if (isset($type)) {
        $User = Mongodbclass::conn(); 
        $res = $User->findOne(
            array('_id' => $_SESSION['id']),
            array($type => true)
        );
    
        try {
            
            $Items = Mongodbclass::conn($type); 
            $i = $Items->find(
                array( "_id" =>  array('$in' => $res[$type] ) )
            );

        } catch (Exception $e) {
            $i = array();            
        }
        $app->render('meusItems.php', array('i' => $i, 'type' => $type));
    }
});

/**
 * Páginas Institucionais:
 * - Quem Somos
 * - Sobre
 * - Politica de Privacidade
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

$app->get('/politica-de-privacidade', function() use ($app){
    $app->render('policy.php');
});


/**
 * Importação do CSV para popular inicialmente a base
 */
$app->get('/import', function() user ($app) {
   
    $fp = fopen('./protected/data/import.csv', 'r');

    echo '<pre>';

    $i = 0;
    while ($csv = fgetcsv($fp)) {
        $i++;
        
        $date = $csv[0];
        array_shift($csv);
        $obj = array(
            "_id" => $i . time(),
            "movies" => array_filter($csv),
        );

        $m   = new MongoClient();
        $db  = $m->selectDB('washido');
        $col = new MongoCollection($db, 'users');

        $res = $col->insert($obj);
        print_r($res);
    }
    
});

$app->run();

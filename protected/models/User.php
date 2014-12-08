<?php 

/**
* Classe de usuário
*/

class User
{
    
    private $_id;
    private $email;
    private $item;

    function __construct()
    {
        
    }

    public function setId($id){
        $this->_id = $id;
    }

    public function setEmail($email){
        $this->email = $email;
    }

    public function setItems(Items $items){
        $this->item = $items;
    }

    public function getId(){
        return $this->_id;
    }

    public function getEmail(){
        return $this->email;
    }

    public function save()
    {
        $Mongo = Mongodbclass::conn();
        $query = array('_id' => $this->getId());
        $user  = $Mongo->findOne($query);

        // verifica se já existe um usuário, se não houver então cria uma
        if(count($user) == 0){
            $user = $Mongo->insert($query);
        }

        try {
            $items = $this->item->getIdItems();
            $type  = $this->item->getType();

            // pesquisa pelo usuário criado e atualiza a lista de items, apenas adiciona os que ainda não existem
            $ret = $Mongo->findAndModify(
                $query, 
                array('$addToSet' => array( $type => array( '$each' => $items ) ) ), 
                array(), 
                array("new" => true)
            );
            
        } 
        // caso dê merdinha, gera uma excessão
        catch (MongoResultException $e) {
            echo $e->getCode(), " : ", $e->getMessage(), "\n";
            var_dump($e->getDocument());
        }
    }

}
<?php 

/**
* Classe de usuário
*/

class User
{
    
    private $_id;
    private $email;
    private $movies;
    private $books;
    private $musics;

    public function setId($id){
        $this->_id = $id;
    }

    public function setEmail($email){
        $this->email = $email;
    }

    public function setMovies(Items $movies){
        $this->movies = $movies->getItems();
    }

    public function getId(){
        return $this->_id;
    }

    public function getEmail(){
        return $this->email;
    }

    public function getMovies(){
        return $this->movies;
    }


    public function save()
    {
        $Mongo = Mongodbclass::conn();
        $user  = $Mongo->findOne(
            array( 
                '_id' => $this->getId() 
                )
            );


        if(count($user) > 0){
            
            /* @TODO Atualizar os filmes do usuário */

        }else{

            $obj = array(
                '_id'    => $this->getId(),
                'movies' => $this->movies,
                'books'  => array(),
                'musics' => array()
            );

            $Mongo->insert($obj);            
        }
    }

    public function saveItems()
    {
           
    }
}
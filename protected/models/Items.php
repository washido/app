<?php


class Items {

    const cMUSIC = 'musics';
    const cMOVIE = 'movies';
    const cBOOK  = 'books';
    
    private $items = array();
    private $type;


    function __construct($type = null)
    {
        $this->type = $type;
    }

    public function setItems($items = array())
    {
        if(is_array($items))
        {
            $this->items = $items;
        }
    }

    public function getItems()
    {
        return $this->items;
    }

    public function getIdItems()
    {
        $listItems = array();
        foreach($this->items as $i){
            $listItems[] = $i['_id'];
        }
        return $listItems;
    }

    public function setType($type)
    {
        $this->type = $type;
    }

    public function getType()
    {
        return $this->type;
    }

    /**
     * [recomendar description]
     * @return [type] [description]
     */
    public function recomendar()
    {

        /**
         * Procura por todos os filmes de todos usuários
         */

        foreach ($users as $u):
            if($usuarioDados['email'] !== $u['email']){
                echo '<pre>' . print_r($u['movies'], true) . '</pre>';

                $intersect = sizeof( array_intersect( $u['movies'], $usuarioDados['movies'] ) );
                $union     = sizeof( array_unique( array_merge( $u['movies'], $usuarioDados['movies'] ) ) );
                $res       = $intersect / $union;
                echo 'Indice de similaridade: ' . $res . '<hr>';
                $maisProximos[$u['_id']] = $res;
            }
        endforeach;

    }

    /**
     * Salva os itens que tem em memória em suas collections
     */
    public function save()
    {
        $Mongo = Mongodbclass::conn($this->type);

        foreach ($this->items as $item):
            $res = $Mongo->findOne(array('_id' => $item['_id']));

            if(count($res) == 0)
                $Mongo->insert($item);
        
        endforeach;
    }
   
}
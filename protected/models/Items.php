<?php


class Items {

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
            $itemsAux = array();
            foreach($items as $i)
            {
                if(isset($i['title']))
                    $itemsAux[] = $i['title'];
            }
            $this->items = $itemsAux;
        }
    }

    public function getItems()
    {
        return $this->items;
    }

    public function setType($type)
    {
        $this->type = $type;
    }

    public function getType()
    {
        return $this->type;
    }

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
   
}
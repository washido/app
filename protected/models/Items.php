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

   
}
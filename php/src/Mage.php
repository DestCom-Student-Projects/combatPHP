<?php

class Mage extends Perso{
    
    public function __construct(/*array $data*/)
        {
            //$this->hydrate($data);
            $this->setVie(100);
            $this->setDefense(0);
            $this->setAttaque(random_int(5,10));
        }
}

?>
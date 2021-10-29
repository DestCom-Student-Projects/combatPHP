<?php 
    class Guerrier extends Perso{
        public function __construct(/*array $data*/)
            {
                //$this->hydrate($data);
                $this->setVie(100);
                $this->setDefense(random_int(10,19));
                $this->setAttaque(random_int(20,40));
            }
    }
?>
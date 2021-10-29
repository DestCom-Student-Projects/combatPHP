<?php
    class Perso{
        private int $id;
        private string $pseudo;
        private int $vie;
        private int $defense;
        private int $attaque;
        private string $typePerso;

        public function setPseudo(string $pseudo){
            $this->pseudo = $pseudo;
        }
        public function setVie(int $vie){
            $this->vie = $vie;
        }
        public function setDefense(int $defense){
            $this->defense = $defense;
        }
        public function setAttaque(int $attaque){
            $this->attaque = $attaque;
        }
        public function setType(string $typePerso){
            $this->typePerso = $typePerso;
        }


        public function getId(){
            return $this->id;
        }

        public function getPseudo(){
            return $this->pseudo;
        }

        public function getVie(){
            return $this->vie;
        }

        public function getDefense(){
            return $this->defense;;
        }

        public function getAttaque(){
            return $this->attaque;
        }

        public function getType(){
            return $this->typePerso;
        }

        public static function attaque(Perso $joueur, Perso $ennemi){
            $vieEnnemi = $ennemi->getVie();
            $defenseEnnemi = $ennemi->getDefense();
            $attaqueJoueur = $joueur->getAttaque();

            $valAtt = $attaqueJoueur - $defenseEnnemi;
            if($valAtt <= 0){
                $valAtt = 0;
            }

            $newVie = $vieEnnemi - $valAtt;

            if($newVie<=0){
                $newVie = 0;
            }

            $ennemi->setVie($newVie);

            $manager = new persoManager;

            $manager->update($ennemi);
        }

        /*
        private function hydrate(array $data){
            foreach($data as $key => $value){
                $methode= 'set' . ucfirst($key);

                if(is_callable([$this, $methode])){
                    $this->$methode($value);
                }
            }
        }
        */
    }

?>
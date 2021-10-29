<?php

    class persoManager{

        private $pdo;
        private $pdoStatement;

        public function __construct()
        {
            $host = 'db';
            $user = 'root';
            $pass = 'MYSQL_ROOT_PASSWORD';
            $mydatabase = 'combatphp';
            $connectorString = 'mysql:host='. $host . ';dbname=' . $mydatabase;
            $this->pdo = new PDO($connectorString, $user, $pass, array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
        }

        public function create(Perso $perso){
            $this->pdoStatement = $this->pdo->prepare('INSERT INTO perso VALUE(NULL, :pseudo, :vie, :defense, :attaque, :typePerso )');

            $this->pdoStatement->bindValue(':pseudo', $perso->getPseudo(), PDO::PARAM_STR);
            $this->pdoStatement->bindValue(':vie', $perso->getVie(), PDO::PARAM_STR);
            $this->pdoStatement->bindValue(':defense', $perso->getDefense(), PDO::PARAM_STR);
            $this->pdoStatement->bindValue(':attaque', $perso->getAttaque(), PDO::PARAM_STR);
            $this->pdoStatement->bindValue(':typePerso', $perso->getType(), PDO::PARAM_STR);

            $executeIsOk = $this->pdoStatement->execute();

            if(!$executeIsOk){
                return false;
            }
            else{
                $id = $this->pdo->lastInsertId();
                $perso = $this->read($id);

                return $id;
                //return true;
            }
        }
        
        public function getLastId(){
            $id = $this->pdo->lastInsertId();
            return $id;
        }

        public function read($id){
            $this->pdoStatement = $this->pdo->prepare('SELECT * FROM perso WHERE id = :id');

            $this->pdoStatement->bindValue(':id', $id, PDO::PARAM_INT);

            $executeIsOk = $this->pdoStatement->execute();

            if($executeIsOk){
                $perso = $this->pdoStatement->fetchObject('Perso');

                if($perso === false){
                    return null;
                }
                else{
                    return $perso;
                }
            }
            else{
                return false;
            }
        }
        /*
        public function readFromPseudo($pseudo){
            $this->pdoStatement = $this->pdo->prepare('SELECT * FROM perso WHERE pseudo = :pseudo');

            $this->pdoStatement->bindValue(':pseudo', $pseudo, PDO::PARAM_INT);

            $executeIsOk = $this->pdoStatement->execute();

            if($executeIsOk){
                $perso = $this->pdoStatement->fetchObject('Perso');

                if($perso === false){
                    return null;
                }
                else{
                    return $perso;
                }
            }
            else{
                return false;
            }
        }
        */
        public function readAll(){
            $this->pdoStatement = $this->pdo->query('SELECT * FROM perso');

            $persos = [];

            while($perso = $this->pdoStatement->fetchObject('Perso')){
                $persos[]= $perso;
            }

            return $persos;
        }

        public function update(Perso $perso){
            $this->pdoStatement = $this->pdo->prepare('UPDATE perso SET pseudo=:pseudo, vie=:vie, defense=:defense, attaque=:attaque, typePerso=:typePerso WHERE id=:id LIMIT 1');

            $this->pdoStatement->bindValue(':pseudo', $perso->getPseudo(), PDO::PARAM_STR);
            $this->pdoStatement->bindValue(':vie', $perso->getVie(), PDO::PARAM_STR);
            $this->pdoStatement->bindValue(':defense', $perso->getDefense(), PDO::PARAM_STR);
            $this->pdoStatement->bindValue(':attaque', $perso->getAttaque(), PDO::PARAM_STR);
            $this->pdoStatement->bindValue(':typePerso', $perso->getType(), PDO::PARAM_STR);
            $this->pdoStatement->bindValue(':id', $perso->getId(), PDO::PARAM_STR);

            return $this->pdoStatement->execute();
        }

        public function delete(Perso $perso){
            $this->pdoStatement = $this->pdo->prepare('DELETE FROM perso WHERE id=:id LIMIT 1');

            $this->pdoStatement->bindValue(':id', $perso->getId(), PDO::PARAM_INT);

            return $this->pdoStatement->execute();
        }


        public function save(Perso $perso){
            if(is_null($perso->getId())){
                return $this->create($perso);
            }
            else{
                return $this->update($perso);
            }
        }

        /*
        public function delete(Perso $perso){

        }
        */
    }

?>
<?php

class Database
{
    private $dbhost = 'localhost';
    private $dbuser = 'root';
    private $dbpass = '';
    private $dbname = 'ooplogreg';
    public  $pdo;

    public function __construct(){

        if (!isset($this->pdo)){
            try{
                $link = new PDO("mysql:host=".$this->dbhost.";dbname=".$this->dbname,$this->dbuser,$this->dbpass);
                $link->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
                $link->exec("SET CHARACTER SET utf8");
                $this->pdo = $link;
            }catch(PDOException $exception){
                die("Failed to connection with Database".$exception->getMessage());
            }
        }
    }

}
<?php
    abstract class DbConnection{
        private static $pdo;


        private static  function setConnection(){
            self::$pdo =new PDO("mysql:host=localhost;dbname=biblio;charset=utf8",'root','');
            self::$pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_WARNING);
        }
        protected function getBdd(){
            if(self::$pdo===null){
                self::setConnection();
            }
            return self::$pdo;
        }

    }
?>
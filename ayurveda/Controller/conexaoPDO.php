<?php
	function Conectar(){
        try{
            $option = array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES UTF8');
            $connection = new PDO("mysql:host=localhost; dbname=helena;", "root", "", $option);
            return $connection;
        } catch (Exception $e){
            echo 'Erro: '.$e->getMessage();
            return null;
        }
    }
?>
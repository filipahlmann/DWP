<?php

class Dbh {

   protected function connect() {
       try {
        $username = "filipsdwp_dk";
        $password = "ynj35ksw";
        $dbh = new PDO('mysql:host=filipsdwp.dk.mysql;dbname=filipsdwp_dk', $username, $password);
        return $dbh; 
       }
       catch (PDOException $e) {
        print "Error!: " . $e->getMessage() . "</br>";
        die();
       }
   }
}
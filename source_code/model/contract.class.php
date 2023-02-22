<?php 
class Contract {
    private $dbh;

    public function __construct($dbh){
        $this->dbh = $dbh;
    }
}
<?php

/**
 * Created by PhpStorm.
 * User: markus.reimann
 * Date: 5.04.2017
 * Time: 10:28
 */
class mysql
{//Klassi algus
    //Klassi omadused
    var $conn = false; //Ühendus andmebaasi serveriga
    var $host = false; //andmebaasi serveri host
    var $user = false; //andmebaasi serveri kasutaja
    var $pass = false; //andmebaasi serveri parool
    var $dbname = false; //andmebaasi serveris andmebaas

    //Klassi tegevused
    function __construct($h, $u, $p, $dn){ //Konstruktor algus
        $this->host = $h;
        $this->user = $u;
        $this->pass = $p;
        $this->dbname = $dn;
        $this->connect();
    }//Konstruktor lõpp

    function connect(){
        $this->conn = mysqli_connect($this->host, $this->user, $this->pass, $this->dbname);
        if (mysqli_connect_error()){
            echo 'Viga andmebaasiserveriga ühendamisel<br />';
            exit;
        }
    }//Connect lõpp

    //Päringu teostamine
    function query($sql){
        $res = mysqli_query($this->conn, $sql);
        if($res == false){
            echo 'Viga päringus!<br />';
            echo '<b>'.$sql.'</b><br />';
            echo mysqli_error($this->conn).'<br />';
            exit;
        }
        return $res;
    }//Päringu teostamise lõpp

    //Andmetega päringu teostamine
    function qetArray($sql){
        $res = $this->query($sql);
        $data = array();
        while ($row = mysqli_fetch_assoc($res)){
            $data[] = $row;
        }
        if(count($data) == 0){
            return false;
        }
        return $data;
    }//Andmete päringu teostuse lõpp

}//Klassi lõpp
?>
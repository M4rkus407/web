<?php

/**
 * Created by PhpStorm.
 * User: markus.reimann
 * Date: 22.03.2017
 * Time: 12:11
 */
class template
{ //Klassi algus
    // template klassi omadused-muutujad
    var $file = ''; //html mall faili nimi
    var $content = false; //html mall faili sisu
    var $vars = array(); //html vaate sisu- reaalsed väärtused
    //Klassi tegevused- meetodid- funktsioonid

    //Klassi konstruktor
    function __construct($f){
        $this->file = $f; //määrame html mall faili nime
        $this->LoadFile(); //Loeme määratud failist sisu
    }//Konstruktori lõpp

    //Html mall faili lugemine
    function loadFile(){
        $f = $this->file;//Lokaalne asendus
        if(!is_dir(TMPL_DIR)) {//Kontrollime mallide kausta olemasolu
            echo 'Kataloogi'.TMPL_DIR.'ei leitud</ br>';
            exit;
        }
        //Kui fail on olemas ja lugemiseks sobiv
        if(file_exists($f) and is_file($f) and is_readable($f)){
            //Loeme failist malli sisu
            $this->readFile($f);
        }

        //Lisame TMPL_DIR kasutusse
        $f = TMPL_DIR.$this->file; //veel üks lokaalne asendus
        if(file_exists($f) and is_file($f) and is_readable($f)){
            //Loeme failist malli sisu
            $this->readFile($f);
        }

        //Lisame .html laienduse kasutusse
        $f = TMPL_DIR.$this->file.'.html'; //veel üks lokaalne asendus
        if(file_exists($f) and is_file($f) and is_readable($f)){
            //Loeme failist malli sisu
            $this->readFile($f);
        }

        //Kui sisu ei olnud võimalik lugeda
        if($this->content == false){
            echo 'Ei suutnud lugeda faili'.$this->file.'</ br>';
        }

    }//Loadfile lõpp. Html mall faili lugemine lõpp

    //Loeme sisu html malli failist
    function readFile($f){
        $this->content = file_get_contents($f);
    }//ReadFile'i lõpp

    //Koostame paarid malli_element=> reaalsed_väärtused
    function  set($name, $val){
        $this->vars[$name] = $val;
    }//set

    //html malli täitmine reaalse sisuga
    function  parse(){
         $str = $this->content; //lokaalne asendus
        //vaatame malli elementide massiivi
        foreach ($this->vars as $name=>$val){
            $str = str_replace('{'.$name.'}',$val, $str);
            //tagastame täidetud malli sisu
            return $str;
        }
    }//parse

}//Klassi lõpp
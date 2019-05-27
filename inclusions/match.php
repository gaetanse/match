<?php

class Match extends Equipe{
	
private $_equipe1;
private $_equipe2;
private $_equipe1Degatsubis=0;
private $_equipe2Degatsubis=0;
private $_nbdefrapp=0;
private $_nbDeJoueurs=0;

public function __Construct($equipe1,$equipe2,$nbDeJoueurs,$nbdeFrape){
	$this->_nbDeJoueurs=$nbDeJoueurs;
	$this->_equipe1=$equipe1;
	$this->_equipe2=$equipe2;
	$this->_nbdefrapp=$nbdeFrape;
}

public function Ini(){
    return 1;
}

    public function Get_degatsubit1(){
        return $this->_equipe1Degatsubis;
    }

    public function Get_degatsubit2(){
        return $this->_equipe2Degatsubis;
    }

    public function Set_degatsubit1($degat1){
        $this->_equipe1Degatsubis+=$degat1;
    }

    public function Set_degatsubit2($degat2){
        $this->_equipe2Degatsubis+=$degat2;
    }


    public function Get_nbj(){
    return $this->_nbDeJoueurs;
}

public function Get_equipe1(){
    return $this->_equipe1;
}

    public function Get_equipe2(){
        return $this->_equipe2;
    }

    public function Get_frappe(){
        return $this->_nbdefrapp;
    }

}

?>
<?php

class Personnage{
	
private $_nom="";
private $_force=0;
private $_degats=0;

public function __Construct($nom){
	$this->_nom=$nom;
	$this->_force=rand(0, 200);
}

public function Get_ini(){
    return 1;
}

public function Get_degats(){
	return $this->_degats;
}

public function Set_degats($degat){
    $this->_degats=($this->_degats+$degat);
}

public function Get_nom(){
	return $this->_nom;
}

public function Get_force(){
	return $this->_force;
}

public function Frapper($force){
    $this->Set_degats($force);
	return 1;
}
  
}

?>
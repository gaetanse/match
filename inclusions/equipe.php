<?php

class Equipe extends Personnage{
	
private $_nbDeJoueurs=0;
private $_nom="";
private $_membres;
private $_nb=0;

public function __Construct($nom,$nbDeJoueurs,$_numeroEquipe){
	$this->_membres=[];
	$this->_nom=$nom;
	$this->_nbDeJoueurs=$nbDeJoueurs;
}

public function Ini(){
    return 1;
}

public function Get_nbj(){
    return $this->_nbDeJoueurs;
}

public function Get_nom(){
	return $this->_nom;
}

public function Transferemembre($numero,$membre){
    $this->_membres[$numero]=$membre;
    return 1;
}

public function Get_membres($b){
	return $this->_membres[$b];
}

public function Ajoutermembre($membre){
    $this->_membres[]=$membre;
    $this->_nb+=1;
}
	
public function Supprimemembre($numero){
    unset($this->_membres[$numero]);
    return 1;
}
  
}

?>
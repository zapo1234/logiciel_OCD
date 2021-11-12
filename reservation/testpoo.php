<?php
class Homme{
public $name;
public $prenom;
public $call;

 public function__construct($name,$prenom,$call){
	 
	$this->name =$name;
    $this->prenom =$prenom;	
	$this->call = $call;
 }
 
 
 public function rouler(){
	 
	echo'je me suis léve à'.$this->name;
 }
 }
 
 $result = new Homme('zapo','martial','Bonjour');
  
  echo $resut->rouler();














?>
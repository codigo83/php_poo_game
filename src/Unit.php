<?php

namespace Codigo83;

use Codigo83\Armors\Armor;

abstract class Unit{


	protected $alive;
	protected $hp;
	protected $name;
	protected $armour= null;
	protected $arm;

	public function __construct($name, $hp){
		$this->name= $name;
		$this->hp= $hp;
		$this->alive= true;
		$this->arm= null; 
	}


	/*SETTER Y GETTERS*/
	public function getName(){
		return $this->name;
	}


	public function getAlive(){
		return $this->alive;
	}

	public function getHp(){
		return $this->hp;
	}

	public function setHp($hp){
		$this->hp = $hp;
	}

	public function setArmour(Armor $armour){
		$this->armour= $armour;
	}


	public function setArm(Arm $arm){
		$this->arm= $arm;
	}

	public function getArm(){
		return $this->arm;
	}


	public function hasArmour(){
		return $this->armour;
	}

	public function move($direction){
		show( "{$this->name} se mueve hacia $direction" );
	}

	//Otras funciones

	public function takeDamage($damage){


		$this->hp= $this->hp - $damage;

		if($this->hp <= 0){
			$this->die();
		}else{

			show("<strong>{$this->name}</strong> pierde {$damage} puntos de vida");
		}

	
	}

	public function absorbDamage($damage){
		
		if($this->armour){

			$damage= $this->armour->absorbDamage($damage);
			
		}
		return $damage;
	}

	public function die(){

		if($this->getAlive()){

			$this->alive= false;
			show("<mark style='background-color:IndianRed'><strong>{$this->getName()}</strong> ha muerto</mark>");	

		}else{
			show("Le estas pegando a un cadaver");
		}

		
	}

	

	public abstract function attack(Unit $opponent);

}

?>
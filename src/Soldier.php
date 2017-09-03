<?php

namespace Codigo83;

class Soldier extends Unit {

	protected $damage;
	
	
	public function __construct($name, $hp, $damage){
		parent::__construct($name, $hp);
		$this->damage= $damage;
		
	}
	
	
	
	public function getDamage(){
		return $this->damage;
	}

	public function attack(Unit $opponent){

		if( $this->getAlive() && $opponent->getAlive()){

			show( "<mark style='background-color:yellow' >({$this->getHp()}) {$this->name}</mark> golpea con su espada a  {$opponent->name}" );
			$opponent->takeDamage( $this->getArm()->getDamage() );
		}
		

	}


	public function takeDamage($damage){
		
		$damage= $this->absorbDamage($damage);

		return parent::takeDamage( $damage );
		
	}

	

}

?>

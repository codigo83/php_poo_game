<?php

namespace Codigo83;

class Archer extends Unit{

	protected $damage;
	
	public function __construct($name, $hp, $damage){
		parent::__construct($name, $hp);
		$this->damage= $damage;
	}

	public function getDamage(){
		return $this->damage;
	}


	public function attack(Unit $opponent){

		if($this->getAlive() && $opponent->getAlive() ){

			show( "<mark style='background-color:lightblue'>({$this->getHp()}) {$this->name}</mark> dispara una flecha a {$opponent->name}" );

			$opponent->takeDamage( $this->getArm()->getDamage() );

		}
	}

	public function takeDamage($damage){

		if( rand(0,1) != 0 ){
			
			show("<strong>{$this->getName()}</strong> esquivó el ataque");
		}else{
			$damage= $this->absorbDamage($damage);
			parent::takeDamage( $damage );
		}
	
	}


}

?>
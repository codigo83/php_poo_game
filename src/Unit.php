<?php

namespace Codigo83;

use Codigo83\Armor;
use Codigo83\Weapon;
use Codigo83\Weapons\Stick;
use Codigo83\Weapons\StrongBow;


class Unit{


	protected $alive;
	protected $hp;
	protected $name;
	protected $armor;
	protected $weapon;

	public function __construct($name, Weapon $weapon= null){

		$this->weapon= (( $weapon === null )? new Stick() : $weapon );
		
		$this->name= $name;
		$this->hp= 100;
		$this->alive= true;
		$this->armor= null;
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

	


	public function setWeapon(Weapon $weapon){
		$this->weapon= $weapon;
	}

	public function getWeapon(){
		return $this->weapon;
	}

	public function setArmour(Armor $armor){
		$this->armor= $armor;
	}

	public function hasArmor(){
		return $this->armor;
	}

	public function move($direction){
		show( "{$this->name} se mueve hacia $direction" );
	}

	//Otras funciones

	//Recibir daño
	public function takeDamage(Attack $attack){

		$damage= $this->absorbDamage($attack->getDamage());

		$this->hp= $this->hp - $damage;

		if($this->hp <= 0){
			$this->die();
		}else{
			

			show("<mark style='background-color:IndianRed'><strong>{$this->name}</strong> pierde {$damage} puntos de vida. Ahora tiene (". $this->hp .")</mark>");
		}

	
	}

	//absorber daño
	public function absorbDamage($damage){
		
		if($this->armor){
			
			$damage= $this->armor->absorbDamage($damage);
			
		}
		return $damage;
	}



	public function die(){

		if($this->getAlive()){

			$this->alive= false;
			show("<mark style='background-color:Crimson'><strong>{$this->getName()}</strong> ha muerto</mark>");	

		}else{
			show("Le estas pegando a un cadaver");
		}

		
	}

	

	public function attack(Unit $opponent){


		if( $this->getAlive() ){
			
			$attack= $this->weapon->createAttack();

			//var_dump($attack);die();

			show(  $attack->getDescription( $this, $opponent )  );

			if( rand(0, 1 ) == 0 ){

				$opponent->takeDamage( $attack  );
			
			}else{
				
				show("<mark style='background-color:DeepSkyBlue'><strong>". $opponent->getName() ."</strong> esquiva el ataque. Ahora tiene hp: (". $opponent->getHp() .")</mark>");
			}



		}


	}










}

?>
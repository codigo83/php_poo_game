<?php

function show($message){
	echo "<p>{$message}</p>";
}


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

	public function setArmour(Armour $armour){
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


class Arm{
	protected $name;
	protected $damage;
	public function __construct($name, $damage){
		$this->name= $name;
		$this->damage= $damage;
	}
	public function getName(){
		return $this->name;
	}
	public function getDamage(){
		return $this->damage;
	}
	public function toString(){
		return $this->getName() . ', ' . $this->getDamage();
	}
}


interface Armour{
	public function absorbDamage($damage);

}


class BronceArmour implements Armour{

	public function damage($damage){
		return $damage / 2;
	}
	public function absorbDamage($damage){
		return round( $this->damage($damage) );
	}
	public function toString(){
		return get_class($this);
	}

}

class SilverArmour implements Armour{

	public function damage($damage){
		return $damage / 4;
	}
	public function absorbDamage($damage){
		return round( $this->damage($damage) );
	}
	public function toString(){
		return get_class($this);
	}

}



class Battle{
	private $fighterA;
	private $fighterB;
	
	public function __construct(Unit $a, Unit $b){
		$this->fighterA= $a;
		$this->fighterB= $b;
	}

	public function start(){
		show("<strong>Comienza la batalla entre {$this->fighterA->getName()} y {$this->fighterB->getName()}</strong>");
		show("<mark style='background-color: yellow'><strong>{$this->fighterA->getName()}</strong> hp: ({$this->fighterA->getHp()}), arm: ({$this->fighterA->getArm()->toString()}), armour: (" . ((  $this->fighterA->hasArmour()  )?  $this->fighterA->hasArmour()->toString()  : 'no') . ")</mark> ");
		show("<mark style='background-color: lightblue'><strong>{$this->fighterB->getName()}</strong> hp: ({$this->fighterB->getHp()}), arm: ({$this->fighterB->getArm()->toString()}), armour: (" . ((  $this->fighterB->hasArmour()  )? $this->fighterB->hasArmour()->toString() : 'no') . ") </mark>");
		show("<hr/>");

		while($this->status()){
			

			$this->fighterA->attack($this->fighterB);
			$this->fighterB->attack($this->fighterA);

		}
		
		$winner=($this->fighterA->getAlive())? $this->fighterA->getName() : $this->fighterB->getName();

		show("<mark style='background-color: lightgreen'>El vencedor del duelo és <strong>$winner</strong></mark>");

	}

	public function status(){
		if($this->fighterA->getAlive() && $this->fighterB->getAlive() )
			return true;
		else
			return false;
	}

}








$bronceArm= new BronceArmour();
$silverArm= new SilverArmour();

$espada= new Arm('Espada', 40);
$flecha= new Arm('Flecha', 25);


$soldado= new Soldier('Áragon', 100, 40);
$arquero= new Archer('Legolas', 100, 20);

$soldado->setArm( $espada );
$arquero->setArm( $flecha );


$batalla= new Battle( $soldado, $arquero);

$soldado->setArmour($bronceArm);
$arquero->setArmour($silverArm);

$batalla->start();


?>

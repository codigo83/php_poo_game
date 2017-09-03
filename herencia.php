<?php

function show($message){
	echo "<p>{$message}</p>";
}


abstract class Unit{


	protected $alive;
	protected $hp= 100;
	protected $name;

	public function __construct($name){
		$this->name= $name;
		$this->alive= true;
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




class Soldier extends Unit{

	protected $damage= 38;

	public function attack(Unit $opponent){

		if( $this->getAlive() && $opponent->getAlive()){

			show( "<mark style='background-color:yellow' >({$this->getHp()}) {$this->name}</mark> golpea con su espada a  {$opponent->name}" );
			$opponent->takeDamage( $this->damage );
		}
		

	}


	public function takeDamage($damage){
		
		return parent::takeDamage( $damage/2 );
	
	}

}


class Archer extends Unit{

	protected $damage= 30;
	

	public function attack(Unit $opponent){

		if($this->getAlive() && $opponent->getAlive() ){

			show( "<mark style='background-color:lightblue'>({$this->getHp()}) {$this->name}</mark> dispara una flecha a {$opponent->name}" );
			$opponent->takeDamage( $this->damage );

		}
	}

	public function takeDamage($damage){

		if( rand(0,1) ){
			
			show("{$this->getName()} esquivó el ataque");
		}else{
			parent::takeDamage( $damage );
		}
	
	}
}



class Battle{
	private $a;
	private $b;
	
	public function __construct(Unit $a, Unit $b){
		$this->a= $a;
		$this->b= $b;
	}

	public function start(){
		show("<p><strong>Comienza la batalla entre {$this->a->getName()} y {$this->b->getName()}</strong></p>");
		
		while($this->status()){

			$this->a->attack($this->b);
			$this->b->attack($this->a);
		}
		
		if($this->a->getAlive())
			$winner= $this->a->getName();
		else
			$winner= $this->b->getName();

		show("<mark style='background-color: lightgreen'>El vencedor del duelo és <strong>$winner</strong></mark>");

	}

	public function status(){
		if($this->a->getAlive() && $this->b->getAlive() )
			return true;
		else
			return false;
	}
}



$soldado= new Soldier('Áragon');
$arquero= new Archer('Legolas');

$batalla= new Battle( $soldado, $arquero);

$batalla->start();




		






//$arquero->die();
//$arquero->die();







?>

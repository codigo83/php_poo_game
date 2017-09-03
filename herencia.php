<?php
	
abstract class Unit{

	protected $alive;
	protected $name;

	public function __construct($name){
		$this->name= $name;
		$this->alive= true;
	}

	public function move($direction){
		echo "<p>{$this->name} se mueve hacia $direction</p>";
	}

	public abstract function attack(Unit $opponent);



}




class Soldier extends Unit{

	public function attack(Unit $opponent){
		echo "<p>{$this->name} corta en dos a {$opponent->name}</p>";
	}
}


class Archer extends Unit{

	public function attack(Unit $opponent){
		echo "<p>{$this->name} dispara una flecha a {$opponent->name}</p>";
	}
}



$soldado= new Soldier('Warrino');
$arquero= new Archer('Legolas');

$soldado->move('la izquierda');

$soldado->attack($arquero);





?>

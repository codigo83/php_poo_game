<?php

namespace Codigo83;


require 'src/helpers.php'; 
require 'vendor/Armour.php';

spl_autoload_register( function($className){

	show('Intentando cargar '.$className);

	if( strpos($className, 'Codigo83\\') === 0 ){
	
		$className= str_replace('Codigo83\\', '', $className);
			

		
		if( file_exists("src/$className.php" ) ){

			require "src/$className.php";
		}
	}

} );






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

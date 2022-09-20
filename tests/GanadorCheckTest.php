<?php
namespace Tests\Feature;
namespace App;


use Exception;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Tests\TestCase;

class WinningTest extends TestCase {

	// determina si ganaste
	public function TWin() {
	
	$w=11;
	$h=9;
	
	$t = new Tablero($w,$h);

	$FichaR = new Ficha('rojo');
	$FichaA = new Ficha('azul');
		
	$d = new DeterminadorResultado($t);
	
	// Ganador si se hace 4 en linea Verticales
	for ($i=0; $i<8; $i++) {
		$t->SoltarFicha(4, $FichaR);
	}
	
	$t->VerTablero();
	
	/*
	
	* * * x
	* * * x
	* * * x
	* * * x
	
	*/

	$this->assertTrue(count($ganadorV = $d->OGVertical()) == 4);
	print($d->Salida($ganadorV));

	$t->LimpiarTablero();
		
	// Ganador si se hace 4 en linea Horizontal
	for ($i=0; $i<8; $i++) {
		$t->SoltarFicha($i, $FichaR);
	}
		
	$t->VerTablero();
	
	/*
	
	* * * *
	* * * *
	* * * *
	x x x x
	
	*/
	
	$this->assertTrue(count($ganadorH = $d->OGHorizontal()) == 4);
	print($d->Salida($ganadorH));

	$t->LimpiarTablero();
	
	// Ganador si las fichas están cruzadas en la esquina inferior derecha

	for ($i=0; $i<4; $i++) {
			$t->SoltarFicha(0, $FichaA);
			$t->SoltarFicha(1, $FichaA);
			$t->SoltarFicha(2, $FichaA);
			$t->SoltarFicha(3, $FichaA);
	}
		
	$t->VerTablero();	

	$this->assertTrue(count($ganadorID = $d->OGInfDer()) == 4);
	print($d->Salida($ganadorID));

	$t->LimpiarTablero();
		
	// Ganador si las fichas están cruzadas en la esquina inferior derecha

	for ($i=0; $i<4; $i++) {
		$t->SoltarFicha(7, $FichaA);
		$t->SoltarFicha(8, $FichaA);
		$t->SoltarFicha(9, $FichaA);
		$t->SoltarFicha(10, $FichaA);
	}	
		
	$t->VerTablero();	
	
	$this->assertTrue(count($ganadorII = $d->OGInfIzq()) == 4);
	print($d->Salida($ganadorII));

	$t->VerTablero();
	
	// Ganador si las fichas están cruzadas en la esquina superior derecha

	$this->assertTrue(count($ganadorSD = $d->OGSupDer()) == 4);
	print($d->Salida($ganadorSD));

	$t->LimpiarTablero();

	// Ganador si las fichas están cruzadas en la esquina superior izquierda

	for ($i=0; $i<9; $i++) {
		$t->SoltarFicha(3, $FichaA);
		$t->SoltarFicha(4, $FichaA);
		$t->SoltarFicha(5, $FichaA);
		$t->SoltarFicha(6, $FichaA);
	}	
	
	$t->VerTablero();	

	$this->assertTrue(count($ganadorSI = $d->OGSupIzq()) == 4);
	print($d->Salida($ganadorSI));
	}
	
}


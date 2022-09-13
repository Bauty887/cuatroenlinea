<?php
// Llamo a todo lo hecho con las Fichas.php
namespace App;

use Exception;

interface InterfazTablero {
	public function LimpiarTablero();
	public function VerificaCasilla(int $posY, int $posX);
	public function SoltarFicha(int $posX, Ficha $f);
	public function VerTablero();
	public function OAltura();
	public function OAncho();
}

class Tablero implements InterfazTablero {

	protected int $Ancho;
	protected int $Altura;
	public array $ATablero;

	// volver el tablero a su estado inicial (todos los espacios blancos)
	public function LimpiarTablero() {

		for ($x=0; $x<$this->Altura; $x++) {
			for ($y=0; $y<$this->Ancho; $y++) {
				$this->ATablero[$y][$x] = new Ficha("blanco");
			}
		}

	}

	public function OAltura() {
		return $this->Altura;
	} 

	public function OAncho() {
		return $this->Ancho;
	} 

	// llamada cada vez que se instancia un nuevo Tablero
	public function __construct(int $Ancho, int $Altura) {
		
		if (!($Ancho >= 4 && $Altura >=4)) {
			throw new \Exception("Dimensiones del tablero no válidas(Menor a 4x4)");
			return;
		}

		$this->Ancho = $Ancho;
		$this->Altura = $Altura;	
		$this->LimpiarTablero();
	}
	
	// verifica contenido de casilla
	public function VerificaCasilla(int $posY, int $posX) {
		return (($this->ATablero[$posY][$posX]->ConseguirColor() == 'rojo') || ($this->ATablero[$posY][$posX]->ConseguirColor() == 'azul'));
	}
	
	// suelta la ficha
	public function SoltarFicha(int $posX, Ficha $f) {
		
		if ($this->Ancho-1 < $posX || $posX < 0) {
			throw new \Exception("Se esta intentando colocar una ficha por fuera de las dimensiones del tablero");
			return;
		}

		$i = $this->Altura;
		
		while(--$i>=0) {
			if (!$this->VerificaCasilla($posX,$i)) {
				$this->ATablero[$posX][$i] = $f;
				break;
			}
		}
	}
	
	// mostrar contenido del tablero actual
	public function VerTablero() {
		$title="TABLERO DE JUEGO";
		
		echo "\n" . str_repeat('-', strlen($title)) . "\n";
		echo $title;
		echo "\n" . str_repeat('-', strlen($title)) . "\n";
		
		for ($x=0; $x<$this->Ancho; $x++) {
			if ($x==0) echo "\t" . $x . "\t";
			else echo $x . "\t";
		}
		echo "\n";
		
		for ($x=0; $x<$this->Altura; $x++) {
			echo $x . "\t";
			for ($y=0; $y<$this->Ancho; $y++) {
				echo $this->ATablero[$y][$x]->ConseguirColor() . "\t";
			}
			echo "\n";
		}
	}

}
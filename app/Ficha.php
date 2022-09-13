<?php
// Toda lo definidos aca pertenece a App (Osea cualquier código al nombrar a namespace App, podrá obtener/llamar este código)
namespace App;

use Exception;

interface InterfazFicha {
	// Muestra en la interfaz el color de la Ficha
	public function ConseguirColor();
}

class Ficha implements InterfazFicha {

	protected String $colorFicha;
	
	// llamada cada vez que se instancia una nueva Ficha
	public function __construct(String $colorFicha) {

		if (!($colorFicha == 'rojo' || $colorFicha == 'azul' || $colorFicha == 'blanco')) {
			throw new \Exception("No se reconoce el color de la Ficha");
			return;
		}

		$this->colorFicha = $colorFicha;
	}

	// retorna el color de la Ficha
	public function ConseguirColor() {
		return $this->colorFicha;
	}

}
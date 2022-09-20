<?php

// todo lo definido anteriormente y acá queda guardado en el espacio App.
namespace App;


interface InterfazResultado {
	public function OGHorizontal(); // Ganador Horizontal
	public function OGVertical(); 	// Ganador Horizontal
	public function OGSupDer();		// Ganador Superior Derecha
	public function OGInfDer();		// Ganador Inferior Derecha
	public function OGSupIzq();		// Ganador Superior Izquierda
	public function OGInfIzq();		// Ganador Inferior Izquierda
	public function Salida($arr);	// Te imprime la pos de las fichas de los ganadores
}


class CheckGanador implements InterfazResultado {

	protected Tablero $tablero;

	public function __construct(Tablero $tablero) {
		$this->tablero = $tablero;
	}

	private function CheckFicha($i,$j,$azul,$rojo,$PAGanadora,$PRGanadora) {
			if ($this->tablero->tablero[$j][$i]->ConseguirColor() == 'azul' && ($rojo < 4)) {
					if ($azul < 4) {
					$PAGanadora[] = [$j,$i];

					}
					$PRGanadora = [];
					$azul++;
					$rojo=0;

				} else if ($this->tablero->tablero[$j][$i]->ConseguirColor() == 'rojo' && ($azul < 4)) {
					if ($rojo < 4) {
					$PAGanadora[] = [$j,$i];

					}
					$PAGanadora = [];
					$rojo++;
					$azul = 0;
				} else {
					if ($rojo < 4) {
						$rojo=0;
						$PRGanadora = [];
					}
					if ($azul < 4) {
						$azul=0;
						$PAGanadora = [];
					}
				} return [$rojo,$azul,$PAGanadora,$PRGanadora];
	}

	// Test ganador Horizontal
	public function OGHorizontal() {

		for ($i=0; $i<($this->tablero->OAltura()); $i++) {

			$PRGanadora = [];
			$PAGanadora = [];
			$azul=0;
			$rojo=0;

			for ($j=0; $j<($this->tablero->OAncho()); $j++ ) {
				$vals = $this->CheckFicha($i,$j,$azul,$rojo,$PAGanadora,$PRGanadora);
				$rojo = $vals[0];
				$azul= $vals[1];
				$PAGanadora= $vals[2];
				$PRGanadora= $vals[3];
			}
				if ($azul>=4) {
				return $PAGanadora;
			} else if ($rojo >=4) {
				return $PRGanadora;
			}
		} return false;
	}

	// Test ganador Vertical
	public function OGVertical() {

		for ($i=0; $i<($this->tablero->OAncho()); $i++) {
			$PRGanadora = [];
			$PAGanadora = [];
			$azul=0;
			$rojo=0;

			for ($j=0; $j<($this->tablero->OAltura()); $j++ ) {
				$vals = $this->CheckFicha($j,$i,$azul,$rojo,$PAGanadora,$PRGanadora);
				$rojo = $vals[0];
				$azul= $vals[1];
				$PAGanadora= $vals[2];
				$PRGanadora= $vals[3];
			}

			if ($azul>=4) {
				return $PAGanadora;
			} else if ($rojo >=4) {
				return $PRGanadora;
			}
		} return false;
	}
	
	// Test ganador Superior Derecha
	public function OGSupDer() {

		for ($i=0; $i<($this->tablero->OAncho())-3; $i++) {

			$PRGanadora = [];
			$PAGanadora = [];
			$azul=0;
			$rojo=0;

			for ($row=$i, $nc=0; $row<($this->tablero->OAncho()) && $nc<($this->tablero->OAltura()); $row++, $nc++ ) {
				$vals = $this->CheckFicha($nc,$row,$azul,$rojo,$PAGanadora,$PRGanadora);
				$rojo = $vals[0];
				$azul= $vals[1];
				$PAGanadora= $vals[2];
				$PRGanadora= $vals[3];
			}

			if ($azul>=4) {
				return $PAGanadora;
			} else if ($rojo >=4) {
				return $PRGanadora;
			}
		} return false;
	}

	// Test ganador Inferior Derecha
	public function OGInfDer() {

		for ($j=1; $j<($this->tablero->OAltura())-3; $j++) {
		
			$azul=0;
			$rojo=0;
			$PAGanadora = [];
			$PRGanadora = [];
			
			for ($nc=$j, $row=0; $nc<($this->tablero->OAltura()) && $row<($this->tablero->OAncho()); $row++, $nc++ ) {
				$vals = $this->CheckFicha($nc,$row,$azul,$rojo,$PAGanadora,$PRGanadora);
				$rojo = $vals[0];
				$azul= $vals[1];
				$PAGanadora= $vals[2];
				$PRGanadora= $vals[3];
			}

			if ($azul>=4) {
				return $PAGanadora;
			} else if ($rojo >=4) {
				return $PRGanadora;
			}
		} return false;
	}
	
	// Test ganador Superior Izquierda 
	public function OGSupIzq() {
	
		for ($j=($this->tablero->OAltura())-1; $j>=3; $j--) {
		
			$azul=0;
			$rojo=0;
			$PAGanadora = [];
			$PRGanadora = [];
			
			for ($nc=$j, $row=0; $nc>=0 && $row<($this->tablero->OAncho()); $row++, $nc-- ) {
				$vals = $this->CheckFicha($nc,$row,$azul,$rojo,$PAGanadora,$PRGanadora);
				$rojo = $vals[0];
				$azul= $vals[1];
				$PAGanadora= $vals[2];
				$PRGanadora= $vals[3];
			}

			if ($azul>=4) {
				return $PAGanadora;
			} else if ($rojo >=4) {
				return $PRGanadora;
			} return false;
		}
	}
	
	// Test ganador Inferior Izquierda 
	public function OGInfIzq() {
	
		for ($i=1; $i<($this->tablero->OAncho())-3; $i++) {
		
			$azul=0;
			$rojo=0;
			$PAGanadora = [];
			$PRGanadora = [];
			
			for ($row=$i, $nc=($this->tablero->OAltura())-1; $row<($this->tablero->OAncho()) && $nc>=0; $row++, $nc-- ) {
				$vals = $this->CheckFicha($nc,$row,$azul,$rojo,$PAGanadora,$PRGanadora);
				$rojo = $vals[0];
				$azul= $vals[1];
				$PAGanadora= $vals[2];
				$PRGanadora= $vals[3];
			}

			if ($azul>=4) {
				return $PAGanadora;
			} else if ($rojo >=4) {
				return $PRGanadora;
			}
		} return false;
	}

	// Funcion para de Salida
	public function Salida($arr) {
		for ($i=0; $i<count($arr); $i++)
			print "( " . $arr[$i][0] . ", " . $arr[$i][1] . ")\n";
	}

}
<?php
namespace Tests\Feature;
namespace App;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Tests\TestCase;

class TableroTest extends TestCase{
public function TestearTablero(){

// Creo un tablero de (x,y) dimensiones y dos variables con los colores de la ficha
$t = new Tablero(5,5);
$FichaR = new Ficha('roja');
$FichaA = new Ficha('azul');

// Suelto fichas en posiciones al azar
$t->SoltarFicha(3,$FichaR());
$t->SoltarFicha(3,$FichaA());
$t->SoltarFicha(3,$FichaR());
$t->SoltarFicha(2,$FichaA());
$t->SoltarFicha(1,$FichaR());
$t->SoltarFicha(4,$FichaA());

$rojas = 0;
$azules = 0;
$blancas = 0;

// Cuento fichas rojas y azules en el tablero
for ($x=0; $x<$this->Altura; $x++) {
    for ($y=0; $y<$this->Ancho; $y++) {
    if(($t->tablero[$x][$y]->ConseguirColor()) == 'azul'){
    $azules++;
    }else if(($t->tablero[$x][$y]->ConseguirColor()) == 'roja'){
            $rojas++;
    }else $blancas++;
    }
}

$this->assertTrue($blancas == 5*5-($rojas+$azules));

}
}
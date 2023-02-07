<?php

use PHPUnit\Framework\TestCase;

include './src/enana.php';

class EnanaTest extends TestCase
{
    private $enana;
    public function setUp(): void
    {
        $this->enana = new enana('Laura', 15, 'viva');
    }
    public function testHeridaLeveVive()
    {

        #Se probará el efecto de una herida leve a una Enana con puntos de vida suficientes para sobrevivir al ataque
        #Se tendrá que probar que la vida es mayor que 0 y además que su situación es viva
        $this->enana->heridaLeve();
        $this->assertEquals("viva", $this->enana->situacion());
        $this->assertEquals(5, $this->enana->puntosVida());
    }
    public function testHeridaLeveMuere()
    {

        #Se probará el efecto de una herida leve a una Enana con puntos de vida insuficientes para sobrevivir al ataque
        #Se tendrá que probar que la vida es menor que 0 y además que su situación es muerta
        $this->enana = new enana('Ana', 5, 'viva');
        $this->enana->heridaLeve();
        $this->assertEquals("muerta", $this->enana->situacion());
        $this->assertEquals(-5, $this->enana->puntosVida());
    }

    public function testPocimaRevive()
    {

        #Se probará el efecto de administrar una pócima a una Enana muerta pero con una vida mayor que -10 y menor que 0
        #Se tendrá que probar que la vida es mayor que 0 y que su situación ha cambiado a viva
        $this->enana = new enana('Ana Maria', -5, 'muerta');
        $this->enana->pocima();
        $this->assertEquals("viva", $this->enana->situacion());
        $this->assertEquals(5, $this->enana->puntosVida());
    }
    public function testPocimaExtraLimbo()
    {

        #Se probará el efecto de administrar una pócima Extra a una Enana en el limbo.
        #Se tendrá que probar que la vida es 50 y la situación ha cambiado a viva.
        $this->enana = new enana('Ana Maria', 0, 'muerta');
        $this->enana->pocimaExtra();
        $this->assertEquals("viva", $this->enana->situacion());
        $this->assertEquals(50, $this->enana->puntosVida());
    }
}

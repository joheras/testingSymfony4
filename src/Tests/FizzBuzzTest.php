<?php

namespace App\Tests;
use Symfony\Bundle\FrameworkBundle\Tests\TestCase;
use App\Model\FizzBuzz;

class FizzBuzzTest extends TestCase{
    
    // Primer test. El ejemplo más sencillo sería que la función nos devolviera 
    // el primer número.
    public function testGenerate_First_Number_If_MaxNumber_Is_One(){
        $this->assertEquals([1], FizzBuzz::generateOutput(1),"El primer elemento es 1");
    }
    
    // Segundo test. El siguiente ejemplo sería que la función nos devolviera 
    // los dos primeros números.
    public function testGenerate_The_First_Two_Numbers_If_MaxNumber_Is_Two(){
        $this->assertEquals([1,2], FizzBuzz::generateOutput(2),"Los dos primeros números");
    }
    
    // Tercer test. El siguiente ejemplo sería abordar ya la implementación de
    // la lógica para el Fizz. 
    public function testGenerate_The_First_Two_Numbers_And_Fizz_If_MaxNumber_Is_Three(){   
        $this->assertEquals([1,2,"Fizz"], FizzBuzz::generateOutput(3),
                "Los dos primeros números y Fizz");
    }
    
    // Cuarto test. Según tenemos el código, el ejemplo del 4 también funciona, 
    // así que pasamos al ejemplo del Buzz.
    public function testGenerate_The_First_Five_Numbers_With_Fizz_And_Buzz_If_MaxNumber_Is_Five(){   
        $this->assertEquals([1,2,"Fizz",4,"Buzz"], FizzBuzz::generateOutput(5),
                "Los cinco primeros elementos con Fizz y Buzz");
    }
    
    // Quinto test. Según tenemos el código, los ejemplos hasta el número 14
    // funcionan, así que pasamos al ejemplo del FizzBuzz.
    public function testGenerate_The_First_Fiveteen_Numbers_With_Fizz_And_Buzz_If_MaxNumber_Is_Fiveteen(){   
        $this->assertEquals([1,2,"Fizz",4,"Buzz","Fizz",7,8,"Fizz","Buzz",11,"Fizz",13,14,"FizzBuzz"], FizzBuzz::generateOutput(15),
                "Los quince primeros elementos con Fizz, Buzz y FizzBuzz");
    }
}

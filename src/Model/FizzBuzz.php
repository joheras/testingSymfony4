<?php

namespace App\Model;


class FizzBuzz {
    
    public static function generateOutput($n){
        
        // Primera solución. Falsificamos el restultado y comprobamos que el
        // resultado producido por nuestro algoritmo es el correcto para el
        // primer caso de prueba.
        
//         $lista = [1];
//         return $lista;
        
        // Segunda solución. Introducimos un bucle y empezamos a implementar una
        // solución más genérica.
        
//        $lista = [];
//        for($i=1;$i<=$n;$i++){
//            $lista[]=$i;
//        }
//        return $lista;
        
        // Tercera solución. Añadimos un if para distinguir los dos comportamientos.
//        $lista = [];
//        for($i=1;$i<=$n;$i++){
//            if($i % 3 == 0){
//                $lista[]="Fizz";
//            }else{
//                $lista[]=$i;
//            }
//        }
//        return $lista;
        
        // Cuarta solución. Refeactorizamos, simplificando el código para evitar
        // la duplicación de añadir un elemento al array. 
        $lista = [];
        for ($i = 1; $i <= $n; $i++) {
            $lista[] = FizzBuzz::getValue($i);
        }
        return $lista;
 
    }

    // Parte de la cuarta solución.
//    private static function getValue($i) {
//        if ($i % 3 == 0) {
//            return "Fizz";
//        }
//        return $i;
//    }
    
    // Quinta solución. Simplemente modificamos la función getValue().
//    private static function getValue($i) {
//        if ($i % 3 == 0) {
//            return "Fizz";
//        } 
//        if ($i % 5 == 0) {
//            return "Buzz";
//        } 
//        return $i;
//    }
//    
    // Sexta solución. De nuevo simplemente modificamos la función getValue().
    private static function getValue($i) {
        if ($i % 3 == 0 && $i%5==0) {
            return "FizzBuzz";
        } 
        if ($i % 3 == 0) {
            return "Fizz";
        } 
        if ($i % 5 == 0) {
            return "Buzz";
        } 
        return $i;
    }

    
}

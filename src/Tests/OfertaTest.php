<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Tests;
use Symfony\Component\Validator\Validation;
use Symfony\Bundle\FrameworkBundle\Tests\TestCase;
use App\Model\Oferta;

class OfertaTest extends TestCase{

    private $validator;
    
    // Parte fundamental ya que nos permite utilizar el 
    // validador en los tests. 
    protected function setUp(){
        $this->validator = Validation::createValidatorBuilder()->enableAnnotationMapping()->getValidator();
    }
    
    // Validamos el nombre
    public function testValidarNombre(){
        $oferta = new Oferta();
        
        $listaErrores = $this->validator->validate($oferta);
        $this->assertGreaterThan(0,$listaErrores->count(),
                'El nombre no puede dejarse en blanco');
        
        $error = $listaErrores[0];
        $this->assertEquals('This value should not be blank.',
                $error->getMessage());
    }
    
    // Validamos la descripción
    public function testValidarDescripcion(){
        $oferta = new Oferta();
        $oferta->nombre="Prueba";
        
        $listaErrores = $this->validator->validate($oferta);
        $this->assertGreaterThan(0,$listaErrores->count(),
                'La descripción no puede dejarse en blanco');
        
        $error = $listaErrores[0];
        $this->assertEquals('This value should not be blank.',
                $error->getMessage());
        
        $oferta->descripcion="Esto es una prueba";
        $listaErrores = $this->validator->validate($oferta);
        $this->assertGreaterThan(0,$listaErrores->count(),
                'La descripción tiene que tener al menos 30 caracteres');
        
        $error = $listaErrores[0];
        $this->assertEquals('This value is too short. It should have 30 characters or more.',
                $error->getMessage());
    }
    
    // Validamos el precio
    public function testValidarPrecio(){
        $oferta = new Oferta();
        $oferta->nombre="Prueba";
        $oferta->descripcion="Esto es una descripcion lo suficientemente larga como para pasar el test";
        $oferta->precio=-10;
        $listaErrores = $this->validator->validate($oferta);
        $this->assertGreaterThan(0,$listaErrores->count(),
                'El precio debe ser mayor que 0');
        
        $error = $listaErrores[0];
        $this->assertEquals('This value should be greater than 0.',
                $error->getMessage());
        
        $oferta->precio=0;
        $listaErrores = $this->validator->validate($oferta);
        $this->assertGreaterThan(0,$listaErrores->count(),
                'El precio debe ser mayor que 0');
        
        $error = $listaErrores[0];
        $this->assertEquals('This value should be greater than 0.',
                $error->getMessage());
    }
    
    // Validamos las fechas
    public function testValidarFechas(){
        $oferta = new Oferta();
        $oferta->nombre="Prueba";
        $oferta->descripcion="Esto es una descripcion lo suficientemente larga como para pasar el test";
        $oferta->precio=10;
        $oferta->fechaExpiracion=new \DateTime('yesterday');
        $oferta->fechaPublicacion=new \DateTime('now');
        
        $listaErrores = $this->validator->validate($oferta);
        $this->assertGreaterThan(0,$listaErrores->count(),
                'La fecha de publicación debe ser anterior a la de expiración');
        
        $error = $listaErrores[0];
        $this->assertEquals('La fecha de publicación debe ser anterior a la de expiración',
                $error->getMessage());
        
    }
    
    
}

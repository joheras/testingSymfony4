<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Model;

use Symfony\Component\Validator\Constraints as Assert;

class Oferta {
    /**
     * @Assert\NotBlank()
     */
    public $nombre;
    /**
     * @Assert\NotBlank()
     * @Assert\Length(min=30)
     */
    public $descripcion;
    /**
     * @Assert\Date
     */
    public $fechaPublicacion;
    /**
     * @Assert\Date
     */
    public $fechaExpiracion;
     /**
     * @Assert\GreaterThan(0)
     */
    public $precio;
    /**
     * @Assert\IsTrue(message = "La fecha de publicación debe ser anterior a la de expiración")
     */
    public function isFechasValidas(){
        return $this->fechaExpiracion->format('Y-m-d') > $this->fechaPublicacion->format('Y-m-d');
    }   
    
    function __construct() {
        $this->fechaPublicacion= new \DateTime('yesterday');
        $this->fechaExpiracion= new \DateTime('now');
    }

   
}

<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Controller;
use Symfony\Component\HttpFoundation\Response;


/**
 * Description of DefaultController
 *
 * @author joheras
 */
class DefaultController {
    public function index()
    {
        return new Response('Esta es la portada');
    }
    
    public function posts()
    {
        return new Response('Esta es la página con los posts');
    }
    
    public function post($slug)
    {
        return new Response('Esta es la página del post ' . $slug);
    }
    
    public function archives()
    {
        return new Response('Esta es la página de los archivos');
    }
}

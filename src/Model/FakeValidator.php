<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Model;

use App\Model\IEmailValidator;

class FakeValidator implements IEmailValidator{
    public function isValidEmail($email) {
        return strpos(strtolower($email),"@gmail.com");
    }
}

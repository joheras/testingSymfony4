<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Model;


class DummyValidator implements IEmailValidator{
    public function isValidEmail($email) {
        return null;
    }
}

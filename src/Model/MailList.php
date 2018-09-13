<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Model;
use App\Model\IEmailValidator;


class MailList {
    
    private $emailValidator;
    private $emails = [];
    
    function __construct(IEmailValidator $emailValidator) {
        $this->emailValidator=$emailValidator;
    }
    
    public function addEmail($email){
        if($this->emailValidator->isValidEmail($email)){
            $this->emails[]=$email;
        }else{
            throw new \Exception('Invalid email');
        }
    }
    
    public function numberOfMails(){
        return sizeof($this->emails);
    }

    
    public function listOfMails(){
        return $this->emails;
    }
    
}

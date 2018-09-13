<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Tests;
use Symfony\Bundle\FrameworkBundle\Tests\TestCase;
use App\Model\MailList;
use App\Model\DummyValidator;
use App\Model\StubValidator;
use App\Model\MockValidator;
use App\Model\FakeValidator;

class MailListTest extends TestCase{
   
    public function testInitial_MailList_is_empty(){
        $dummyValidator = new DummyValidator();
        $maillist = new MailList($dummyValidator);
        $this->assertEquals(0, $maillist->numberOfMails(),"Al principio la lista de correo está vacía");
    }
    
    /**
    * @expectedException Exception
    */
    public function testInvalidEmail_Launches_Exception(){
        $stubValidator = new StubValidator();
        $maillist = new MailList($stubValidator);
        $maillist->addEmail("name@");
    }
    
    public function testEmail_Validator_Is_Called_When_Adding_anEmail(){
        $mockValidator = new MockValidator();
        $maillist = new MailList($mockValidator);
        $maillist->addEmail("name@");
        $this->assertEquals(true, $mockValidator->iscalled,"El método para validar es invocado");
    }
    
    public function testGmail_Is_Added(){
        $fakeValidator = new FakeValidator();
        $maillist = new MailList($fakeValidator);
        $maillist->addEmail("joheras@gmail.com");
        $this->assertContains("joheras@gmail.com", $maillist->listOfMails(),
                "Si el correo es de gmail se añade");
    }
    
    /**
    * @expectedException Exception
    */
    public function testInvalidEmail_Launches_Exception_WithMockBuilder(){
        $stubMockBuilderValidator = $this->createMock('StubMockBuilderValidator');
        $stubMockBuilderValidator -> method('isValidEmail')->willReturn(false);
        $maillist = new MailList($stubMockBuilderValidator);
        $maillist->addEmail("name@");
    }
    
    
}

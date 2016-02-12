<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Auth\Form;

use Zend\Form\Form;
use Zend\Form\Element;
use Zend\Form\Fieldset;

/**
 * Description of Login
 *
 * @author ENRIQUE
 */
class LoginForm extends Form {

    public function __construct($name = null) {
        // we want to ignore the name passed
        parent::__construct($name);
        
        $this->setAttributes(array(
                            'data-ng-controller' => 'loginCtrl',
                            'class' => 'my-form',
                            'data-ng-submit' => 'submit()'));

        $user = new Element\Text('user');
        $user->setAttributes(array('required' => 'required','data-ng-model' => 'user'));
        ////->setLabel('Usuario')
//                ->setAttribute('data-ng-model','user')
//                ->setAttribute('required', 'required');
        
        $pass = new Element\Password('pass');
        $pass//->setLabel('Contraseña')
                ->setAttribute('data-ng-model','pass')
                ->setAttribute('required', 'required');
        
        $submit = new Element\Submit('entrar');
        $submit->setValue('Entrar');
        
        $this->add($user);
        $this->add($pass);
        $this->add($submit);
    }

}

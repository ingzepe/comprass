<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Auth\Model;

use Auth\Form\LoginForm;
use Auth\Model\AuthFilter;
use Zend\Authentication\Adapter\AdapterInterface;
use Zend\Authentication\Adapter\DbTable as AuthAdapter;
use Zend\Authentication\Result;
use Zend\Authentication\AuthenticationService;
use Zend\Authentication\Storage\Session;

/**
 * Description of Login
 *
 * @author ENRIQUE
 */
class Login implements AdapterInterface {

    protected $form;
    protected $filter;
    protected $authAdapter;
    protected $dbAdapter;
    protected $user;
    protected $pass;
    protected $messages;
    protected $code;

    /*
     * 
      Result::SUCCESS/
      Result::FAILURE
      Result::FAILURE_IDENTITY_NOT_FOUND/
      Result::FAILURE_IDENTITY_AMBIGUOUS
      Result::FAILURE_CREDENTIAL_INVALID/
      Result::FAILURE_UNCATEGORIZED
     */

    public function __construc($request, $dbAdapter) {
        $this->form = new LoginForm();
        $this->form->setData($request);
        $this->dbAdapter = $dbAdapter;
    }

    public function ValidFilter($request) {
        $this->filter = new AuthFilter();
        $this->form = new LoginForm();
        $this->form->setData($request);
        $x = $this->filter->getInputFilter();
        $this->form->setInputFilter($x);
        if ($this->form->isValid()) {
            $this->filter->exchangeArray($this->form->getData());
            $this->user = $this->filter->user;
            $this->pass = $this->filter->pass;
            $resutl = TRUE;
        } else {
            $this->messages = $this->form->getMessages();
            $resutl = FALSE;
        }
        return $resutl;
    }

    public function Auth($dbAdapter) {
//        $dbAdapter = $this->getServiceLocator()->get('Zend\Db\Adapter');
        $this->authAdapter = new AuthAdapter($dbAdapter, 'GP_USUARIOS', 'NOMBRE', 'PASSWORD');
        $this->authAdapter->setIdentity($this->user)->setCredential($this->pass);
        return $this->AuthResult($this->authAdapter->authenticate());
    }

    public function AuthResult($result) {
        $this->code = $result->getCode();
        switch ($result->getCode()) {
            case Result::FAILURE_IDENTITY_NOT_FOUND:
                /** do stuff for nonexistent identity * */
                $this->messages['auth']['failure_identity_not_found'] = "USUARIO NO VALIDO";
                break;
            case Result::FAILURE_CREDENTIAL_INVALID:
                /** do stuff for invalid credential * */
                $this->messages['auth']['failure_credential_invalid'] = "CONTRASEÑA INCORRECTA";
                break;
            case Result::SUCCESS:
                /** do stuff for successful authentication * */
                $this->messages['auth']['success'] = "LOGEADO CON EXITO";
                $this->Success();
                break;
            default:
                /** do stuff for other failure * */
                $this->messages['auth'] = "ERROR DESCONOCIDO";
                break;
        }
    }
    
    private function Success(){
        $auth = new AuthenticationService();
        $auth->authenticate($this->authAdapter);
        $auth->setStorage(new Session('user_auth'));
    }

        public function getCode(){
        return $this->code;
    }
    
    public function getMessage(){
        return $this->messages;
    }

    public function authenticate() {
        
    }

}

<?php

namespace Auth\Controller;

use Auth\Form\LoginForm;
use Auth\Model\Login;
use Zend\Json\Json;
use Zend\Authentication\AuthenticationService;
use Zend\Mvc\Controller\AbstractActionController;
use Zend\Mvc\MvcEvent;
use Zend\View\Model\JsonModel;
use Zend\View\Model\ViewModel;

class AuthController extends AbstractActionController {

    protected $render;

    public function onDispatch(MvcEvent $e) {
        $this->layout('layout/auth');
        $this->renderer = $this->getServiceLocator()->get('Zend\View\Renderer\PhpRenderer');
        return parent::onDispatch($e);
    }

    public function indexAction() {
        $this->authService = new AuthenticationService();
        $this->authService->clearIdentity();
        $this->getViewHelper('InlineScript')->appendFile('js/module/auth/index.js');
        $title = 'Inicio de Sesión';
        $this->renderer->headTitle($title);
        $form = new LoginForm("login");
        return new ViewModel(array('formulario' => $form, 'title' => $title));
    }

    public function loginAction() {
        $this->authService = new AuthenticationService();
        $request = (array) Json::decode($this->getRequest()->getContent());
        if ($this->getRequest()->isPost()) {
            $dbAdapter = $this->getServiceLocator()->get('Zend\Db\Adapter\Adapter');
            $login = new Login($request, $dbAdapter);
            if ($login->ValidFilter($request)) {
                $login->Auth($dbAdapter);
            }
            $result = new JsonModel(array(
                'message' => $login->getMessage(),
                'code' => $login->getCode()
            ));
            echo $result->serialize();
            exit();
        }
    }

    protected function getViewHelper($helperName) {
        return $this->getServiceLocator()->get('viewhelpermanager')->get($helperName);
    }

}

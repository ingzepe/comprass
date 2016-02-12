<?php

namespace Auth\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use Zend\View\Model\JsonModel;
use Zend\Json\Json;
use Auth\Form\LoginForm;
use Auth\Model\Auth;

class IndexController extends AbstractActionController {
    protected $render;

    public function onDispatch(\Zend\Mvc\MvcEvent $e) {
        $this->layout('layout/auth');
        $this->renderer = $this->getServiceLocator()->get('Zend\View\Renderer\PhpRenderer');
        return parent::onDispatch($e);
    }

    public function indexAction() {
        $this->getViewHelper('InlineScript')->appendFile('js/module/auth/index.js');
        $title = 'Inicio de Sesión';
        $this->renderer->headTitle($title);
        $form = new LoginForm("login");
        return new ViewModel(array('formulario' => $form, 'title' => $title));
    }

    public function loginAction() {
        $form = new LoginForm();
        $request = (array)Json::decode($this->getRequest()->getContent());
        if ($this->getRequest()->isPost()) {
            $auth = new Auth();
            $form->setInputFilter($auth->getInputFilter());
            $form->setData($request);
            if ($form->isValid()) {
//                $auth->exchangeArray($form->getData());
//                $this->getAlbumTable()->saveAlbum($auth);
//                $messages = $form->getMessages();
                $messages = "logeado";
            } else {
                $messages = $form->getMessages();
            }
        }
        $result = new JsonModel(array(
            "response" => $messages
        ));
//        print_r($messages);
        echo $result->serialize();
        exit();
    }

    protected function getViewHelper($helperName) {
        return $this->getServiceLocator()->get('viewhelpermanager')->get($helperName);
    }

}

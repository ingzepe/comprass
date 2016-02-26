<?php

/**
 * Zend Framework (http://framework.zend.com/)
 *
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2015 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

namespace Seguridad\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use Zend\View\Model\JsonModel;
use Zend\Authentication\AuthenticationService;

class CapacidadesController extends AbstractActionController {

    protected $capacidadesTable;

    public function onDispatch(\Zend\Mvc\MvcEvent $e) {
        $this->authService = new AuthenticationService();
        if (!$this->authService->hasIdentity()) {
            $this->redirect()->toRoute("auth");
        }
        return parent::onDispatch($e);
    }

    public function indexAction() {
        $this->getViewHelper('InlineScript')->appendFile('js/angular-touch.js');
        $this->getViewHelper('InlineScript')->appendFile('js/ui-grid.min.js');
        $this->getViewHelper('InlineScript')->appendFile('js/module/seguridad/capacidades.js');
    }

    public function consultarAction() {
        $capacidades = $this->getCapacidadesTable()->fetchAll();
        $result = new JsonModel($capacidades);
        echo $result->serialize();
        exit();
    }

    public function editarAction() {
        
    }

    public function agregarAction() {
        
    }

    public function borrarAction() {
        
    }

    public function getCapacidadesTable() {
        if (!$this->capacidadesTable) {
            $sm = $this->getServiceLocator();
            $this->capacidadesTable = $sm->get('Seguridad\Model\CapacidadesTable');
        }
        return $this->capacidadesTable;
    }

    protected function getViewHelper($helperName) {
        return $this->getServiceLocator()->get('viewhelpermanager')->get($helperName);
    }

}

<?php

/**
 * Zend Framework (http://framework.zend.com/)
 *
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2015 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

namespace Roles\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use Zend\Authentication\AuthenticationService;

class RolesController extends AbstractActionController {

    public function onDispatch(\Zend\Mvc\MvcEvent $e) {
        $this->authService = new AuthenticationService();
        if (!$this->authService->hasIdentity()) {
            $this->redirect()->toRoute("auth");
        }
        return parent::onDispatch($e);
    }

    public function indexAction() {
        return new ViewModel();
    }
}

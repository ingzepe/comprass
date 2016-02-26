<?php

/**
 * Global Configuration Override
 *
 * You can use this file for overriding configuration values from modules, etc.
 * You would place values in here that are agnostic to the environment and not
 * sensitive to security.
 *
 * @NOTE: In practice, this file will typically be INCLUDED in your source
 * control, so do not include passwords or other sensitive information in this
 * file.
 */
return array(
    'navigation' => array(
        'default' => array(
            array(
                'label' => 'Inicio',
                'route' => 'home',
                'order' => 1,
            ),
            array(
                'label' => 'Seguridad',
                'uri' => '',
                'order' => 100,
                'pages' => array(
                    array(
                        'label' => 'Login',
                        'route' => 'auth',
                    ),
                    array(
                        'label' => 'Capacidedes',
                        'route' => 'capacidades',
                    ),
                    array(
                        'label' => 'Roles',
                        'route' => 'roles',
                    ),
                ),
            ),
            array(
                'label' => 'Catálogos',
                'uri' => '',
                'order' => 2,
                'pages' => array(
                    array(
                        'label' => 'Empresas',
                        'uri' => 'auth',
                    ),
                ),
            ),
        ),
    ),
    'service_manager' => array(
        'factories' => array(
            'Zend\Db\Adapter\Adapter'=>'Zend\Db\Adapter\AdapterServiceFactory',
            'navigation' => 'Zend\Navigation\Service\DefaultNavigationFactory',
            'Zend\Session\Config\ConfigInterface' => 'Zend\Session\Service\SessionConfigFactory',
        ),
    ),
    'db'=>array(
        'driver'=>'Pdo',
        'dsn'=>'sqlsrv:database=comprass;Server=(localdb)\mssqllocaldb',
    ),
    'session' => array(
        'config' => array(
            'class' => 'Zend\Session\Config\SessionConfig',
            'options' => array(
                'name' => 'user_auth',
//                'cookie_lifetime'     => 120,
                'gc_maxlifetime'      => 1800,
                'remember_me_seconds' => 1800,
            ),
        ),
        'storage' => 'Zend\Session\Storage\SessionArrayStorage',
        'validators' => array(
            'Zend\Session\Validator\RemoteAddr',
            'Zend\Session\Validator\HttpUserAgent',
        ),
    ),
        // ...
);

<?php

 return array(
     'controllers' => array(
         'invokables' => array(
//             'Seguridad\Controller\Seguridad' => 'Seguridad\Controller\SeguridadController',
             'Seguridad\Controller\Capacidades' => 'Seguridad\Controller\CapacidadesController',
             'Seguridad\Controller\Roles' => 'Seguridad\Controller\RolesController',
         ),
     ),
     
     'router' => array(
         'routes' => array(
//             'seguridad' => array(
//                 'type'    => 'segment',
//                 'options' => array(
//                     'route'    => '/seguridad[/:action][/:id]',
//                     'constraints' => array(
//                         'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
//                         'id'     => '[0-9]+',
//                     ),
//                     'defaults' => array(
//                         'controller' => 'Seguridad\Controller\Seguridad',
//                         'action'     => 'index',
//                     ),
//                 ),
//             ),
             'capacidades' => array(
                 'type'    => 'segment',
                 'options' => array(
                     'route'    => '/capacidades[/:action][/:id]',
                     'constraints' => array(
                         'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
                         'id'     => '[0-9]+',
                     ),
                     'defaults' => array(
                         'controller' => 'Seguridad\Controller\Capacidades',
                         'action'     => 'index',
                     ),
                 ),
             ),
             'roles' => array(
                 'type'    => 'segment',
                 'options' => array(
                     'route'    => '/roles[/:action][/:id]',
                     'constraints' => array(
                         'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
                         'id'     => '[0-9]+',
                     ),
                     'defaults' => array(
                         'controller' => 'Seguridad\Controller\Roles',
                         'action'     => 'index',
                     ),
                 ),
             ),
         ),
     ),

     
     'view_manager' => array(
         'template_path_stack' => array(
             'seguridad' => __DIR__ . '/../view',
         ),
     ),
 );
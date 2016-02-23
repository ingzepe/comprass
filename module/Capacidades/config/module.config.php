<?php
namespace Capacidades;

return array(
    'router' => array(
        'routes' => array(
            'capacidades' => array(
                'type' => 'Segment',
                'options' => array(
                    'route'    => '/capacidades',
                    'defaults' => array(
                        'controller' => 'Capacidades',
                        'action'     => 'index',
                    ),
                ),
            ),
            'capacidades' => array(
                'type'    => 'Literal',
                'options' => array(
                    'route'    => '/capacidades',
                    'defaults' => array(
                        '__NAMESPACE__' => 'Capacidades\Controller',
                        'controller'    => 'Index',
                        'action'        => 'index',
                    ),
                ),
                'may_terminate' => true,
                'child_routes' => array(
                    'default' => array(
                        'type'    => 'Segment',
                        'options' => array(
                            'route'    => '/[:controller[/:action]]',
                            'constraints' => array(
                                'controller' => '[a-zA-Z][a-zA-Z0-9_-]*',
                                'action'     => '[a-zA-Z][a-zA-Z0-9_-]*',
                            ),
                            'defaults' => array(
                            ),
                        ),
                    ),
                ),
            ),
        ),
    ),
    'controllers' => array(
        'invokables' => array(
            'Capacidades\Controller\Index' => Controller\CapacidadesController::class
        ),
    ),
    'view_manager' => array(
        'display_not_found_reason' => true,
        'display_exceptions'       => true,
        'doctype'                  => 'HTML5',
        'not_found_template'       => 'error/404',
        'exception_template'       => 'error/index',
        'template_map' => array(
            'capacidades/index/index' => __DIR__ . '/../view/capacidades/index/index.phtml',
        ),
        'template_path_stack' => array(
            __DIR__ . '/../view',
        ),
    ),
    // Placeholder for console routes
    'console' => array(
        'router' => array(
            'routes' => array(
            ),
        ),
    ),
);

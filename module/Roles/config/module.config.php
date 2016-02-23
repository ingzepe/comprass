<?php
namespace Roles;

return array(
    'router' => array(
        'routes' => array(
            'roles' => array(
                'type' => 'Segment',
                'options' => array(
                    'route'    => '/roles',
                    'defaults' => array(
                        'controller' => 'Roles',
                        'action'     => 'index',
                    ),
                ),
            ),
            'roles' => array(
                'type'    => 'Literal',
                'options' => array(
                    'route'    => '/roles',
                    'defaults' => array(
                        '__NAMESPACE__' => 'Roles\Controller',
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
            'Roles\Controller\Index' => Controller\RolesController::class
        ),
    ),
    'view_manager' => array(
        'display_not_found_reason' => true,
        'display_exceptions'       => true,
        'doctype'                  => 'HTML5',
        'not_found_template'       => 'error/404',
        'exception_template'       => 'error/index',
        'template_map' => array(
            'roles/index/index' => __DIR__ . '/../view/roles/index/index.phtml',
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

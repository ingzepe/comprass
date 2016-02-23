<?php
namespace Usuarios;

return array(
    'router' => array(
        'routes' => array(
            'usuarios' => array(
                'type' => 'Segment',
                'options' => array(
                    'route'    => '/usuarios',
                    'defaults' => array(
                        'controller' => 'Usuarios',
                        'action'     => 'index',
                    ),
                ),
            ),
            'usuarios' => array(
                'type'    => 'Literal',
                'options' => array(
                    'route'    => '/usuarios',
                    'defaults' => array(
                        '__NAMESPACE__' => 'Usuarios\Controller',
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
            'Usuarios\Controller\Index' => Controller\UsuariosController::class
        ),
    ),
    'view_manager' => array(
        'display_not_found_reason' => true,
        'display_exceptions'       => true,
        'doctype'                  => 'HTML5',
        'not_found_template'       => 'error/404',
        'exception_template'       => 'error/index',
        'template_map' => array(
            'usuarios/index/index' => __DIR__ . '/../view/usuarios/index/index.phtml',
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

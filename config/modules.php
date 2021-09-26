<?php

return [
    'gii' => [
        'class' => 'yii\gii\Module',
        'allowedIPs' => ['127.0.0.1', '::1'],
    ],
    'rbac' => [
        'class' => 'johnitvn\rbacplus\Module',
        'as access' => [
            'class' => 'yii\filters\AccessControl',
            'rules' => [
                [
                    'allow' => true,
                    'roles' => ['admin'],
                ],
            ],
        ],
    ],
    'main' => [
        'class' => 'app\modules\main\Main',
    ],
    'login' => [
        'class' => 'app\modules\login\LoginModule',
    ],
    'persona' => [
        'class' => 'app\modules\persona\Persona',
    ],
    'encargado' => [
        'class' => 'app\modules\encargado\Encargado',
    ],
    'prueba' => [
        'class' => 'app\modules\prueba\Prueba',
    ],
    'nuevo' => [
        'class' => 'app\modules\nuevo\Nuevo',
    ],
    'seguridad' => [
        'class' => 'app\modules\seguridad\Seguridad',
    ],
    'equipo' => [
        'class' => 'app\modules\equipo\Equipo',
    ],
    'movimiento' => [
        'class' => 'app\modules\movimiento\Movimiento',
    ],
    'orden' => [
        'class' => 'app\modules\orden\Orden',
    ],
    'bandeja' => [
        'class' => 'app\modules\bandeja\Bandeja',
    ],
    'categoria' => [
        'class' => 'app\modules\categoria\Categoria',
    ],
    'tipo' => [
        'class' => 'app\modules\tipo\Tipo',
    ],
    'categoria' => [
        'class' => 'app\modules\categoria\Categoria',
    ],
    'dashboard' => [
        'class' => 'app\modules\dashboard\Dashboard',
    ],
    'preventivo' => [
        'class' => 'app\modules\preventivo\Preventivo',
    ],
    'secciones' => [
        'class' => 'app\modules\secciones\Secciones',
    ],
    'area' => [
        'class' => 'app\modules\area\Area',
    ],
    'blanco' => [
        'class' => 'app\modules\blanco\Blanco',
    ],
    'listapreventivo' => [
        'class' => 'app\modules\listapreventivo\Listapreventivo',
    ],
    'demo' => [
        'class' => 'app\modules\demo\Demo',
    ],
];

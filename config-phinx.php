<?php

$config = require __DIR__ .'/App/config/app.php';
return [
    'paths' => [
        'migrations' => 'Migration'
    ],
    'migration_base_class' => '\Migration\Migration',
    'environments' => [
        'default_migration_table' => 'migrations',
        'default_database' => 'dev',
        'dev' => [
            'adapter' => 'mysql',
            'host' => $config['settings']['db']['host'],
            'name' => $config['settings']['db']['database'],
            'user' => $config['settings']['db']['username'],
            'pass' => $config['settings']['db']['password'],
            'port' => $config['settings']['db']['port']
        ]
    ]
];
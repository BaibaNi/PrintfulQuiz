<?php

return [
    'migration_dirs' => [
        'first' => __DIR__ . '/db/migrations',
        'tests' => __DIR__ . '/db/tests',
    ],
    'environments' => [
        'local' => [
            'db_name' => '',
            'username' => '',
            'password' => '',
            'host' => 'localhost',
            'adapter' => 'mysql',
            'port' => 3306,
            'charset' => 'utf8mb4',
            'collation' => 'utf8mb4_general_ci',
        ]
    ],
    'default_environment' => 'local',
    'log_table_name' => 'phoenix_log',
];
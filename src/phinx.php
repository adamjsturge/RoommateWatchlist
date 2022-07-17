<?php

return
[
    'paths' => [
        'migrations' => '%%PHINX_CONFIG_DIR%%/db/migrations',
        'seeds' => '%%PHINX_CONFIG_DIR%%/db/seeds'
    ],
    'environments' => [
        'default_migration_table' => 'phinxlog',
        'default_environment' => 'development',
        // 'production' => [
        //     'adapter' => 'mysql',
        //     'host' => 'localhost',
        //     'name' => 'production_db',
        //     'user' => 'root',
        //     'pass' => '',
        //     'port' => '3306',
        //     'charset' => 'utf8',
        // ],
        'development' => [ // Setip way to store in config
            'adapter' => 'pgsql',
            'host' => 'localhost',
            'name' => 'main',//'%%PHINX_DBNAME%%',
            'user' => 'myuser',//''%%PHINX_DBUSER%%',
            'pass' => 'mypassword',//''%%PHINX_DBPASS%%',
            'port' => '5432',
            'charset' => 'utf8',
        ],
    ],
    'version_order' => 'creation'
];

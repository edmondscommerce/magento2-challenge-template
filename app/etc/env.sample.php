<?php
return [
    'backend' => [
        'frontName' => 'admin'
    ],
    'crypt' => [
        'key' => 'd240fa72aa782abe68099c2893c3daec'
    ],
    'db' => [
        'connection' => [
            'default' => [
                'host' => 'mysql',
                'dbname' => 'magento',
                'username' => 'root',
                'password' => '234234q!',
                'active' => '1',
                'model' => 'mysql4',
                'engine' => 'innodb',
                'initStatements' => 'SET NAMES utf8;',
                'driver_options' => [
                    1014 => false
                ]
            ]
        ]
    ],
    'resource' => [
        'default_setup' => [
            'connection' => 'default'
        ]
    ],
    'directories' => [
        'document_root_is_pub' => true
    ],
    'x-frame-options' => 'SAMEORIGIN',
    'MAGE_MODE' => 'developer',
    'session' => [
        'save' => 'files'
    ],
    'install' => [
        'date' => 'Thu, 02 Aug 2018 10:07:27 +0000'
    ],
    'http_cache_hosts' => [
        [
            'host' => 'varnish',
            'port' => '80'
        ]
    ],
    'system' => [
        'default' => [
            'web' => [
                'unsecure' => [
                    'base_url' => 'http://localhost:8008/',
                    'base_static_url' => null,
                    'base_media_url' => null
                ],
                'secure' => [
                    'base_url' => 'https://localhost:8008/',
                    'base_static_url' => null,
                    'base_media_url' => null
                ]
            ],
            'catalog' => [
                'search' => [
                  'elasticsearch7_server_hostname' => 'elastic',
                  'elasticsearch7_server_port' => '9200',
                  'elasticsearch7_index_prefix' => 'magento2_'
                ]
            ],
            'twofactorauth' => [
                'general' => [
                    'enable' => 0
                ]
            ]
        ],
    ],
    'cache' => [
        'frontend' => [
            'default' => [
                'backend' => 'Magento\\Framework\\Cache\\Backend\\Redis',
                'backend_options' => [
                    'server' => 'redis',
                    'database' => '0',
                    'port' => '6379',
                    'password' => ''
                ]
            ],
            'page_cache' => [
                'backend' => 'Magento\\Framework\\Cache\\Backend\\Redis',
                'backend_options' => [
                    'server' => 'redis',
                    'port' => '6379',
                    'password' => '',
                    'database' => '1',
                    'compress_data' => '0'
                ]
            ]
        ]
    ],
    'cron_consumers_runner' => [
        'cron_run' => false,
        'max_messages' => 1000,
        'consumers' => [
            'async.operations.all'
        ]
    ],
    'downloadable_domains' => [
        'www.client.internal.developmagento.co.uk'
    ],
    'queue' => [
        'consumers_wait_for_messages' => 0
    ],
    'lock' => [
        'provider' => 'db',
        'config' => [
            'prefix' => ''
        ]
    ],
    'cache_types' => [
        'layout' => 1,
        'block_html' => 1,
        'full_page' => 1,
        'config' => 1,
        'collections' => 1,
        'reflection' => 1,
        'db_ddl' => 1,
        'compiled_config' => 1,
        'eav' => 1,
        'customer_notification' => 1,
        'config_integration' => 1,
        'config_integration_api' => 1,
        'config_webservice' => 1,
        'translate' => 1,
        'vertex' => 1,
        'wp_gtm_categories' => 1
    ]
];

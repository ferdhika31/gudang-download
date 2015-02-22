<?php

return array(
    
    'defaultController' => 'Donlod',
    
    // Just put null value if you has enable .htaccess file
    //'indexFile' => null,
    'indexFile' => INDEX_FILE . '/',
    
    'module' => array(
        'path' => APP,
        'domainMapping' => array(),
    ),
    
    'vendor' => array(
        'path' => GEAR.'vendors/'
    ),
    
    'alias' => array(
        /*
        'controller' => array(
            'class' => 'Alias',
            'method' => 'index'
        ),
        */
        'method' => 'alias'
    ),
);
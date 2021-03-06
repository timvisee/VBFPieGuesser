<?php

// Prevent direct requests to this file due to security reasons
defined('APP_INIT') or die('Access denied!');

// Return the config array
return Array(
    'general' => Array(
        'site_url'          => 'http://local.timvisee.com/app/VBFPieGuesser/app/',
        'site_path'         => '/app/VBFPieGuesser/app'
    ),

    'database' => Array(
        'host' => '127.0.0.1',
        'port' => 3306,
        'database' => 'vbfpieguesser',
        'user' => 'root',
        'password' => '', // Yes, there might be a password in here. Does it matter, NO! Go away, filthy hacker.
        'table_prefix' => 'mpg_'
    ),

    'cookie' => Array(
        'domain' => '',
        'path' => '/',
        'prefix' => 'mpg_'
    ),

    'hash' => Array(
        'algorithm' => 'sha256',
        'salt'  => '7ca8b7833dbd1a03dd6d9175aa25262fab029862b494aac2168f1a6b35f1f406'
    ),

    'app' => Array(
        // TODO: Disable debug mode on release!
        'debug' => true
    ),

    'pusher' => Array(
        'auth_key' => '',
        'secret' => '',
        'app_id' => '',
        'cluster' => 'eu'
    )
);

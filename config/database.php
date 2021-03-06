<?php

use Illuminate\Support\Str;

return [

    /*
    |--------------------------------------------------------------------------
    | Default Database Connection Name
    |--------------------------------------------------------------------------
    |
    | Here you may specify which of the database connections below you wish
    | to use as your default connection for all database work. Of course
    | you may use many connections at once using the Database library.
    |
    */

    'default' => env('DB_CONNECTION', 'mysql'),

    /*
    |--------------------------------------------------------------------------
    | Database Connections
    |--------------------------------------------------------------------------
    |
    | Here are each of the database connections setup for your application.
    | Of course, examples of configuring each database platform that is
    | supported by Laravel is shown below to make development simple.
    |
    |
    | All database work in Laravel is done through the PHP PDO facilities
    | so make sure you have the driver for your particular database of
    | choice installed on your machine before you begin development.
    |
    */

    'connections' => [

        'sqlite' => [
            'driver' => 'sqlite',
            'url' => env('DATABASE_URL'),
            'database' => env('DB_DATABASE', database_path('database.sqlite')),
            'prefix' => '',
            'foreign_key_constraints' => env('DB_FOREIGN_KEYS', true),
        ],

        'mysql' => [
            'driver' => 'mysql',
            'url' => env('DATABASE_URL'),
            'host' => env('DB_HOST', '127.0.0.1'),
            'port' => env('DB_PORT', '3306'),
            'database' => env('DB_DATABASE', 'forge'),
            'username' => env('DB_USERNAME', 'forge'),
            'password' => env('DB_PASSWORD', ''),
            'unix_socket' => env('DB_SOCKET', ''),
            'charset' => 'utf8',
            'collation' => 'utf8_general_ci',
            'prefix' => '',
            'prefix_indexes' => true,
            'strict' => false,
            'engine' => null,
            'options' => extension_loaded('pdo_mysql') ? array_filter([
                PDO::MYSQL_ATTR_SSL_CA => env('MYSQL_ATTR_SSL_CA'),
            ]) : [],
        ],

        'dbgtw' => [
            'driver'    => 'mysql',
            'host'      => '27.254.191.157',
            'database'  => 'gtw',
            'username'  => 'gotowin',
            'password'  => 'Fdm^;bog-91',
            'charset' => 'utf8',
            'collation' => 'utf8_general_ci',
            'prefix'    => '',
            'strict'    => false,
       ],
       'db10672' => [
        'driver'    => 'mysql',
        'host'      => '27.254.191.157',
        'database'  => '10672',
        'username'  => 'gotowin',
        'password'  => 'Fdm^;bog-91',
        'charset' => 'utf8',
        'collation' => 'utf8_general_ci',
        'prefix'    => '',
        'strict'    => false,
   ],
       'db10674' => [
        'driver'    => 'mysql',
        'host'      => '27.254.191.157',
        'database'  => '10674',
        'username'  => 'gotowin',
        'password'  => 'Fdm^;bog-91',
        'charset' => 'utf8',
        'collation' => 'utf8_general_ci',
        'prefix'    => '',
        'strict'    => false,
   ],
   'db10713' => [
    'driver'    => 'mysql',
    'host'      => '27.254.191.157',
    'database'  => '10713',
    'username'  => 'gotowin',
    'password'  => 'Fdm^;bog-91',
    'charset' => 'utf8',
    'collation' => 'utf8_general_ci',
    'prefix'    => '',
    'strict'    => false,
],
'db10714' => [
    'driver'    => 'mysql',
    'host'      => '27.254.191.157',
    'database'  => '10714',
    'username'  => 'gotowin',
    'password'  => 'Fdm^;bog-91',
    'charset' => 'utf8',
    'collation' => 'utf8_general_ci',
    'prefix'    => '',
    'strict'    => false,
],
'db10715' => [
    'driver'    => 'mysql',
    'host'      => '27.254.191.157',
    'database'  => '10715',
    'username'  => 'gotowin',
    'password'  => 'Fdm^;bog-91',
    'charset' => 'utf8',
    'collation' => 'utf8_general_ci',
    'prefix'    => '',
    'strict'    => false,
],
'db10716' => [
    'driver'    => 'mysql',
    'host'      => '27.254.191.157',
    'database'  => '10716',
    'username'  => 'gotowin',
    'password'  => 'Fdm^;bog-91',
    'charset' => 'utf8',
    'collation' => 'utf8_general_ci',
    'prefix'    => '',
    'strict'    => false,
],
'db10717' => [
    'driver'    => 'mysql',
    'host'      => '27.254.191.157',
    'database'  => '10717',
    'username'  => 'gotowin',
    'password'  => 'Fdm^;bog-91',
    'charset' => 'utf8',
    'collation' => 'utf8_general_ci',
    'prefix'    => '',
    'strict'    => false,
],
'db10718' => [
    'driver'    => 'mysql',
    'host'      => '27.254.191.157',
    'database'  => '10718',
    'username'  => 'gotowin',
    'password'  => 'Fdm^;bog-91',
    'charset' => 'utf8',
    'collation' => 'utf8_general_ci',
    'prefix'    => '',
    'strict'    => false,
],
'db10719' => [
    'driver'    => 'mysql',
    'host'      => '27.254.191.157',
    'database'  => '10719',
    'username'  => 'gotowin',
    'password'  => 'Fdm^;bog-91',
    'charset' => 'utf8',
    'collation' => 'utf8_general_ci',
    'prefix'    => '',
    'strict'    => false,
],
'db11125' => [
    'driver'    => 'mysql',
    'host'      => '27.254.191.157',
    'database'  => '11125',
    'username'  => 'gotowin',
    'password'  => 'Fdm^;bog-91',
    'charset' => 'utf8',
    'collation' => 'utf8_general_ci',
    'prefix'    => '',
    'strict'    => false,
],
'db11128' => [
    'driver'    => 'mysql',
    'host'      => '27.254.191.157',
    'database'  => '11128',
    'username'  => 'gotowin',
    'password'  => 'Fdm^;bog-91',
    'charset' => 'utf8',
    'collation' => 'utf8_general_ci',
    'prefix'    => '',
    'strict'    => false,
],
'db11130' => [
    'driver'    => 'mysql',
    'host'      => '27.254.191.157',
    'database'  => '11130',
    'username'  => 'gotowin',
    'password'  => 'Fdm^;bog-91',
    'charset' => 'utf8',
    'collation' => 'utf8_general_ci',
    'prefix'    => '',
    'strict'    => false,
],
'db' => [
    'driver'    => 'mysql',
    'host'      => '27.254.191.157',
    'database'  => '',
    'username'  => 'gotowin',
    'password'  => 'Fdm^;bog-91',
    'charset' => 'utf8',
    'collation' => 'utf8_general_ci',
    'prefix'    => '',
    'strict'    => false,
],
'db11147' => [
    'driver'    => 'mysql',
    'host'      => '27.254.191.157',
    'database'  => '11147',
    'username'  => 'gotowin',
    'password'  => 'Fdm^;bog-91',
    'charset' => 'utf8',
    'collation' => 'utf8_general_ci',
    'prefix'    => '',
    'strict'    => false,
],
'db11152' => [
    'driver'    => 'mysql',
    'host'      => '27.254.191.157',
    'database'  => '11152',
    'username'  => 'gotowin',
    'password'  => 'Fdm^;bog-91',
    'charset' => 'utf8',
    'collation' => 'utf8_general_ci',
    'prefix'    => '',
    'strict'    => false,
],
'db11192' => [
    'driver'    => 'mysql',
    'host'      => '27.254.191.157',
    'database'  => '11192',
    'username'  => 'gotowin',
    'password'  => 'Fdm^;bog-91',
    'charset' => 'utf8',
    'collation' => 'utf8_general_ci',
    'prefix'    => '',
    'strict'    => false,
],
'db11194' => [
    'driver'    => 'mysql',
    'host'      => '27.254.191.157',
    'database'  => '11194',
    'username'  => 'gotowin',
    'password'  => 'Fdm^;bog-91',
    'charset' => 'utf8',
    'collation' => 'utf8_general_ci',
    'prefix'    => '',
    'strict'    => false,
],
'db11205' => [
    'driver'    => 'mysql',
    'host'      => '27.254.191.157',
    'database'  => '11205',
    'username'  => 'gotowin',
    'password'  => 'Fdm^;bog-91',
    'charset' => 'utf8',
    'collation' => 'utf8_general_ci',
    'prefix'    => '',
    'strict'    => false,
],
'db11453' => [
    'driver'    => 'mysql',
    'host'      => '27.254.191.157',
    'database'  => '11453',
    'username'  => 'gotowin',
    'password'  => 'Fdm^;bog-91',
    'charset' => 'utf8',
    'collation' => 'utf8_general_ci',
    'prefix'    => '',
    'strict'    => false,
],
'db11121' => [
    'driver'    => 'mysql',
    'host'      => '27.254.191.157',
    'database'  => '11121',
    'username'  => 'gotowin',
    'password'  => 'Fdm^;bog-91',
    'charset' => 'utf8',
    'collation' => 'utf8_general_ci',
    'prefix'    => '',
    'strict'    => false,
],
'db11131' => [
    'driver'    => 'mysql',
    'host'      => '27.254.191.157',
    'database'  => '11131',
    'username'  => 'gotowin',
    'password'  => 'Fdm^;bog-91',
    'charset' => 'utf8',
    'collation' => 'utf8_general_ci',
    'prefix'    => '',
    'strict'    => false,
],
'db11142' => [
    'driver'    => 'mysql',
    'host'      => '27.254.191.157',
    'database'  => '11142',
    'username'  => 'gotowin',
    'password'  => 'Fdm^;bog-91',
    'charset' => 'utf8',
    'collation' => 'utf8_general_ci',
    'prefix'    => '',
    'strict'    => false,
],
'db11144' => [
    'driver'    => 'mysql',
    'host'      => '27.254.191.157',
    'database'  => '11144',
    'username'  => 'gotowin',
    'password'  => 'Fdm^;bog-91',
    'charset' => 'utf8',
    'collation' => 'utf8_general_ci',
    'prefix'    => '',
    'strict'    => false,
],
'db11189' => [
    'driver'    => 'mysql',
    'host'      => '27.254.191.157',
    'database'  => '11189',
    'username'  => 'gotowin',
    'password'  => 'Fdm^;bog-91',
    'charset' => 'utf8',
    'collation' => 'utf8_general_ci',
    'prefix'    => '',
    'strict'    => false,
],
'db11190' => [
    'driver'    => 'mysql',
    'host'      => '27.254.191.157',
    'database'  => '11190',
    'username'  => 'gotowin',
    'password'  => 'Fdm^;bog-91',
    'charset' => 'utf8',
    'collation' => 'utf8_general_ci',
    'prefix'    => '',
    'strict'    => false,
],
'db' => [
    'driver'    => 'mysql',
    'host'      => '27.254.191.157',
    'database'  => '',
    'username'  => 'gotowin',
    'password'  => 'Fdm^;bog-91',
    'charset' => 'utf8',
    'collation' => 'utf8_general_ci',
    'prefix'    => '',
    'strict'    => false,
],
'db11196' => [
    'driver'    => 'mysql',
    'host'      => '27.254.191.157',
    'database'  => '11196',
    'username'  => 'gotowin',
    'password'  => 'Fdm^;bog-91',
    'charset' => 'utf8',
    'collation' => 'utf8_general_ci',
    'prefix'    => '',
    'strict'    => false,
],
'db11204' => [
    'driver'    => 'mysql',
    'host'      => '27.254.191.157',
    'database'  => '11204',
    'username'  => 'gotowin',
    'password'  => 'Fdm^;bog-91',
    'charset' => 'utf8',
    'collation' => 'utf8_general_ci',
    'prefix'    => '',
    'strict'    => false,
],
'db11452' => [
    'driver'    => 'mysql',
    'host'      => '27.254.191.157',
    'database'  => '11452',
    'username'  => 'gotowin',
    'password'  => 'Fdm^;bog-91',
    'charset' => 'utf8',
    'collation' => 'utf8_general_ci',
    'prefix'    => '',
    'strict'    => false,
],
'db11454' => [
    'driver'    => 'mysql',
    'host'      => '27.254.191.157',
    'database'  => '11454',
    'username'  => 'gotowin',
    'password'  => 'Fdm^;bog-91',
    'charset' => 'utf8',
    'collation' => 'utf8_general_ci',
    'prefix'    => '',
    'strict'    => false,
],
'db11119' => [
    'driver'    => 'mysql',
    'host'      => '27.254.191.157',
    'database'  => '11119',
    'username'  => 'gotowin',
    'password'  => 'Fdm^;bog-91',
    'charset' => 'utf8',
    'collation' => 'utf8_general_ci',
    'prefix'    => '',
    'strict'    => false,
],
'db11120' => [
    'driver'    => 'mysql',
    'host'      => '27.254.191.157',
    'database'  => '11120',
    'username'  => 'gotowin',
    'password'  => 'Fdm^;bog-91',
    'charset' => 'utf8',
    'collation' => 'utf8_general_ci',
    'prefix'    => '',
    'strict'    => false,
],
'db11122' => [
    'driver'    => 'mysql',
    'host'      => '27.254.191.157',
    'database'  => '11122',
    'username'  => 'gotowin',
    'password'  => 'Fdm^;bog-91',
    'charset' => 'utf8',
    'collation' => 'utf8_general_ci',
    'prefix'    => '',
    'strict'    => false,
],
'db11123' => [
    'driver'    => 'mysql',
    'host'      => '27.254.191.157',
    'database'  => '11123',
    'username'  => 'gotowin',
    'password'  => 'Fdm^;bog-91',
    'charset' => 'utf8',
    'collation' => 'utf8_general_ci',
    'prefix'    => '',
    'strict'    => false,
],
'db11124' => [
    'driver'    => 'mysql',
    'host'      => '27.254.191.157',
    'database'  => '11124',
    'username'  => 'gotowin',
    'password'  => 'Fdm^;bog-91',
    'charset' => 'utf8',
    'collation' => 'utf8_general_ci',
    'prefix'    => '',
    'strict'    => false,
],
'db11126' => [
    'driver'    => 'mysql',
    'host'      => '27.254.191.157',
    'database'  => '11126',
    'username'  => 'gotowin',
    'password'  => 'Fdm^;bog-91',
    'charset' => 'utf8',
    'collation' => 'utf8_general_ci',
    'prefix'    => '',
    'strict'    => false,
],
'db11127' => [
    'driver'    => 'mysql',
    'host'      => '27.254.191.157',
    'database'  => '11127',
    'username'  => 'gotowin',
    'password'  => 'Fdm^;bog-91',
    'charset' => 'utf8',
    'collation' => 'utf8_general_ci',
    'prefix'    => '',
    'strict'    => false,
],
'db11129' => [
    'driver'    => 'mysql',
    'host'      => '27.254.191.157',
    'database'  => '11129',
    'username'  => 'gotowin',
    'password'  => 'Fdm^;bog-91',
    'charset' => 'utf8',
    'collation' => 'utf8_general_ci',
    'prefix'    => '',
    'strict'    => false,
],
'db11132' => [
    'driver'    => 'mysql',
    'host'      => '27.254.191.157',
    'database'  => '11132',
    'username'  => 'gotowin',
    'password'  => 'Fdm^;bog-91',
    'charset' => 'utf8',
    'collation' => 'utf8_general_ci',
    'prefix'    => '',
    'strict'    => false,
],
'db11133' => [
    'driver'    => 'mysql',
    'host'      => '27.254.191.157',
    'database'  => '11132',
    'username'  => 'gotowin',
    'password'  => 'Fdm^;bog-91',
    'charset' => 'utf8',
    'collation' => 'utf8_general_ci',
    'prefix'    => '',
    'strict'    => false,
],
'db11134' => [
    'driver'    => 'mysql',
    'host'      => '27.254.191.157',
    'database'  => '11134',
    'username'  => 'gotowin',
    'password'  => 'Fdm^;bog-91',
    'charset' => 'utf8',
    'collation' => 'utf8_general_ci',
    'prefix'    => '',
    'strict'    => false,
],
'db11135' => [
    'driver'    => 'mysql',
    'host'      => '27.254.191.157',
    'database'  => '11135',
    'username'  => 'gotowin',
    'password'  => 'Fdm^;bog-91',
    'charset' => 'utf8',
    'collation' => 'utf8_general_ci',
    'prefix'    => '',
    'strict'    => false,
],
'db11136' => [
    'driver'    => 'mysql',
    'host'      => '27.254.191.157',
    'database'  => '11136',
    'username'  => 'gotowin',
    'password'  => 'Fdm^;bog-91',
    'charset' => 'utf8',
    'collation' => 'utf8_general_ci',
    'prefix'    => '',
    'strict'    => false,
],
'db11137' => [
    'driver'    => 'mysql',
    'host'      => '27.254.191.157',
    'database'  => '11137',
    'username'  => 'gotowin',
    'password'  => 'Fdm^;bog-91',
    'charset' => 'utf8',
    'collation' => 'utf8_general_ci',
    'prefix'    => '',
    'strict'    => false,
],
'db11138' => [
    'driver'    => 'mysql',
    'host'      => '27.254.191.157',
    'database'  => '11138',
    'username'  => 'gotowin',
    'password'  => 'Fdm^;bog-91',
    'charset' => 'utf8',
    'collation' => 'utf8_general_ci',
    'prefix'    => '',
    'strict'    => false,
],
'db11139' => [
    'driver'    => 'mysql',
    'host'      => '27.254.191.157',
    'database'  => '11139',
    'username'  => 'gotowin',
    'password'  => 'Fdm^;bog-91',
    'charset' => 'utf8',
    'collation' => 'utf8_general_ci',
    'prefix'    => '',
    'strict'    => false,
],
'db11140' => [
    'driver'    => 'mysql',
    'host'      => '27.254.191.157',
    'database'  => '11140',
    'username'  => 'gotowin',
    'password'  => 'Fdm^;bog-91',
    'charset' => 'utf8',
    'collation' => 'utf8_general_ci',
    'prefix'    => '',
    'strict'    => false,
],
'db11141' => [
    'driver'    => 'mysql',
    'host'      => '27.254.191.157',
    'database'  => '11141',
    'username'  => 'gotowin',
    'password'  => 'Fdm^;bog-91',
    'charset' => 'utf8',
    'collation' => 'utf8_general_ci',
    'prefix'    => '',
    'strict'    => false,
],

'db11143' => [
    'driver'    => 'mysql',
    'host'      => '27.254.191.157',
    'database'  => '11143',
    'username'  => 'gotowin',
    'password'  => 'Fdm^;bog-91',
    'charset' => 'utf8',
    'collation' => 'utf8_general_ci',
    'prefix'    => '',
    'strict'    => false,
],

'db11145' => [
    'driver'    => 'mysql',
    'host'      => '27.254.191.157',
    'database'  => '11145',
    'username'  => 'gotowin',
    'password'  => 'Fdm^;bog-91',
    'charset' => 'utf8',
    'collation' => 'utf8_general_ci',
    'prefix'    => '',
    'strict'    => false,
],
'db11146' => [
    'driver'    => 'mysql',
    'host'      => '27.254.191.157',
    'database'  => '11146',
    'username'  => 'gotowin',
    'password'  => 'Fdm^;bog-91',
    'charset' => 'utf8',
    'collation' => 'utf8_general_ci',
    'prefix'    => '',
    'strict'    => false,
],
'db11148' => [
    'driver'    => 'mysql',
    'host'      => '27.254.191.157',
    'database'  => '11148',
    'username'  => 'gotowin',
    'password'  => 'Fdm^;bog-91',
    'charset' => 'utf8',
    'collation' => 'utf8_general_ci',
    'prefix'    => '',
    'strict'    => false,
],
'db11149' => [
    'driver'    => 'mysql',
    'host'      => '27.254.191.157',
    'database'  => '11149',
    'username'  => 'gotowin',
    'password'  => 'Fdm^;bog-91',
    'charset' => 'utf8',
    'collation' => 'utf8_general_ci',
    'prefix'    => '',
    'strict'    => false,
],
'db11150' => [
    'driver'    => 'mysql',
    'host'      => '27.254.191.157',
    'database'  => '11150',
    'username'  => 'gotowin',
    'password'  => 'Fdm^;bog-91',
    'charset' => 'utf8',
    'collation' => 'utf8_general_ci',
    'prefix'    => '',
    'strict'    => false,
],
'db11151' => [
    'driver'    => 'mysql',
    'host'      => '27.254.191.157',
    'database'  => '11151',
    'username'  => 'gotowin',
    'password'  => 'Fdm^;bog-91',
    'charset' => 'utf8',
    'collation' => 'utf8_general_ci',
    'prefix'    => '',
    'strict'    => false,
],
'db11153' => [
    'driver'    => 'mysql',
    'host'      => '27.254.191.157',
    'database'  => '11153',
    'username'  => 'gotowin',
    'password'  => 'Fdm^;bog-91',
    'charset' => 'utf8',
    'collation' => 'utf8_general_ci',
    'prefix'    => '',
    'strict'    => false,
],
'db11154' => [
    'driver'    => 'mysql',
    'host'      => '27.254.191.157',
    'database'  => '11154',
    'username'  => 'gotowin',
    'password'  => 'Fdm^;bog-91',
    'charset' => 'utf8',
    'collation' => 'utf8_general_ci',
    'prefix'    => '',
    'strict'    => false,
],
'db11155' => [
    'driver'    => 'mysql',
    'host'      => '27.254.191.157',
    'database'  => '11155',
    'username'  => 'gotowin',
    'password'  => 'Fdm^;bog-91',
    'charset' => 'utf8',
    'collation' => 'utf8_general_ci',
    'prefix'    => '',
    'strict'    => false,
],
'db11156' => [
    'driver'    => 'mysql',
    'host'      => '27.254.191.157',
    'database'  => '11156',
    'username'  => 'gotowin',
    'password'  => 'Fdm^;bog-91',
    'charset' => 'utf8',
    'collation' => 'utf8_general_ci',
    'prefix'    => '',
    'strict'    => false,
],
'db11157' => [
    'driver'    => 'mysql',
    'host'      => '27.254.191.157',
    'database'  => '11157',
    'username'  => 'gotowin',
    'password'  => 'Fdm^;bog-91',
    'charset' => 'utf8',
    'collation' => 'utf8_general_ci',
    'prefix'    => '',
    'strict'    => false,
],
'db11166' => [
    'driver'    => 'mysql',
    'host'      => '27.254.191.157',
    'database'  => '11166',
    'username'  => 'gotowin',
    'password'  => 'Fdm^;bog-91',
    'charset' => 'utf8',
    'collation' => 'utf8_general_ci',
    'prefix'    => '',
    'strict'    => false,
],
'db11167' => [
    'driver'    => 'mysql',
    'host'      => '27.254.191.157',
    'database'  => '11167',
    'username'  => 'gotowin',
    'password'  => 'Fdm^;bog-91',
    'charset' => 'utf8',
    'collation' => 'utf8_general_ci',
    'prefix'    => '',
    'strict'    => false,
],
'db11169' => [
    'driver'    => 'mysql',
    'host'      => '27.254.191.157',
    'database'  => '11169',
    'username'  => 'gotowin',
    'password'  => 'Fdm^;bog-91',
    'charset' => 'utf8',
    'collation' => 'utf8_general_ci',
    'prefix'    => '',
    'strict'    => false,
],
'db11170' => [
    'driver'    => 'mysql',
    'host'      => '27.254.191.157',
    'database'  => '11170',
    'username'  => 'gotowin',
    'password'  => 'Fdm^;bog-91',
    'charset' => 'utf8',
    'collation' => 'utf8_general_ci',
    'prefix'    => '',
    'strict'    => false,
],
'db11171' => [
    'driver'    => 'mysql',
    'host'      => '27.254.191.157',
    'database'  => '11171',
    'username'  => 'gotowin',
    'password'  => 'Fdm^;bog-91',
    'charset' => 'utf8',
    'collation' => 'utf8_general_ci',
    'prefix'    => '',
    'strict'    => false,
],
'db11172' => [
    'driver'    => 'mysql',
    'host'      => '27.254.191.157',
    'database'  => '11172',
    'username'  => 'gotowin',
    'password'  => 'Fdm^;bog-91',
    'charset' => 'utf8',
    'collation' => 'utf8_general_ci',
    'prefix'    => '',
    'strict'    => false,
],
'db11173' => [
    'driver'    => 'mysql',
    'host'      => '27.254.191.157',
    'database'  => '11173',
    'username'  => 'gotowin',
    'password'  => 'Fdm^;bog-91',
    'charset' => 'utf8',
    'collation' => 'utf8_general_ci',
    'prefix'    => '',
    'strict'    => false,
],
'db11174' => [
    'driver'    => 'mysql',
    'host'      => '27.254.191.157',
    'database'  => '11174',
    'username'  => 'gotowin',
    'password'  => 'Fdm^;bog-91',
    'charset' => 'utf8',
    'collation' => 'utf8_general_ci',
    'prefix'    => '',
    'strict'    => false,
],
'db11175' => [
    'driver'    => 'mysql',
    'host'      => '27.254.191.157',
    'database'  => '11175',
    'username'  => 'gotowin',
    'password'  => 'Fdm^;bog-91',
    'charset' => 'utf8',
    'collation' => 'utf8_general_ci',
    'prefix'    => '',
    'strict'    => false,
],
'db11176' => [
    'driver'    => 'mysql',
    'host'      => '27.254.191.157',
    'database'  => '11176',
    'username'  => 'gotowin',
    'password'  => 'Fdm^;bog-91',
    'charset' => 'utf8',
    'collation' => 'utf8_general_ci',
    'prefix'    => '',
    'strict'    => false,
],
'db11177' => [
    'driver'    => 'mysql',
    'host'      => '27.254.191.157',
    'database'  => '11177',
    'username'  => 'gotowin',
    'password'  => 'Fdm^;bog-91',
    'charset' => 'utf8',
    'collation' => 'utf8_general_ci',
    'prefix'    => '',
    'strict'    => false,
],
'db11178' => [
    'driver'    => 'mysql',
    'host'      => '27.254.191.157',
    'database'  => '11178',
    'username'  => 'gotowin',
    'password'  => 'Fdm^;bog-91',
    'charset' => 'utf8',
    'collation' => 'utf8_general_ci',
    'prefix'    => '',
    'strict'    => false,
],
'db11179' => [
    'driver'    => 'mysql',
    'host'      => '27.254.191.157',
    'database'  => '11179',
    'username'  => 'gotowin',
    'password'  => 'Fdm^;bog-91',
    'charset' => 'utf8',
    'collation' => 'utf8_general_ci',
    'prefix'    => '',
    'strict'    => false,
],
'db11180' => [
    'driver'    => 'mysql',
    'host'      => '27.254.191.157',
    'database'  => '11180',
    'username'  => 'gotowin',
    'password'  => 'Fdm^;bog-91',
    'charset' => 'utf8',
    'collation' => 'utf8_general_ci',
    'prefix'    => '',
    'strict'    => false,
],
'db11181' => [
    'driver'    => 'mysql',
    'host'      => '27.254.191.157',
    'database'  => '11181',
    'username'  => 'gotowin',
    'password'  => 'Fdm^;bog-91',
    'charset' => 'utf8',
    'collation' => 'utf8_general_ci',
    'prefix'    => '',
    'strict'    => false,
],
'db11182' => [
    'driver'    => 'mysql',
    'host'      => '27.254.191.157',
    'database'  => '11182',
    'username'  => 'gotowin',
    'password'  => 'Fdm^;bog-91',
    'charset' => 'utf8',
    'collation' => 'utf8_general_ci',
    'prefix'    => '',
    'strict'    => false,
],
'db11183' => [
    'driver'    => 'mysql',
    'host'      => '27.254.191.157',
    'database'  => '11183',
    'username'  => 'gotowin',
    'password'  => 'Fdm^;bog-91',
    'charset' => 'utf8',
    'collation' => 'utf8_general_ci',
    'prefix'    => '',
    'strict'    => false,
],
'db11184' => [
    'driver'    => 'mysql',
    'host'      => '27.254.191.157',
    'database'  => '11184',
    'username'  => 'gotowin',
    'password'  => 'Fdm^;bog-91',
    'charset' => 'utf8',
    'collation' => 'utf8_general_ci',
    'prefix'    => '',
    'strict'    => false,
],
'db11185' => [
    'driver'    => 'mysql',
    'host'      => '27.254.191.157',
    'database'  => '11185',
    'username'  => 'gotowin',
    'password'  => 'Fdm^;bog-91',
    'charset' => 'utf8',
    'collation' => 'utf8_general_ci',
    'prefix'    => '',
    'strict'    => false,
],
'db11186' => [
    'driver'    => 'mysql',
    'host'      => '27.254.191.157',
    'database'  => '11186',
    'username'  => 'gotowin',
    'password'  => 'Fdm^;bog-91',
    'charset' => 'utf8',
    'collation' => 'utf8_general_ci',
    'prefix'    => '',
    'strict'    => false,
],
'db11187' => [
    'driver'    => 'mysql',
    'host'      => '27.254.191.157',
    'database'  => '11187',
    'username'  => 'gotowin',
    'password'  => 'Fdm^;bog-91',
    'charset' => 'utf8',
    'collation' => 'utf8_general_ci',
    'prefix'    => '',
    'strict'    => false,
],
'db11188' => [
    'driver'    => 'mysql',
    'host'      => '27.254.191.157',
    'database'  => '11188',
    'username'  => 'gotowin',
    'password'  => 'Fdm^;bog-91',
    'charset' => 'utf8',
    'collation' => 'utf8_general_ci',
    'prefix'    => '',
    'strict'    => false,
],
'db' => [
    'driver'    => 'mysql',
    'host'      => '27.254.191.157',
    'database'  => '',
    'username'  => 'gotowin',
    'password'  => 'Fdm^;bog-91',
    'charset' => 'utf8',
    'collation' => 'utf8_general_ci',
    'prefix'    => '',
    'strict'    => false,
],
'db11191' => [
    'driver'    => 'mysql',
    'host'      => '27.254.191.157',
    'database'  => '11191',
    'username'  => 'gotowin',
    'password'  => 'Fdm^;bog-91',
    'charset' => 'utf8',
    'collation' => 'utf8_general_ci',
    'prefix'    => '',
    'strict'    => false,
],
'db11193' => [
    'driver'    => 'mysql',
    'host'      => '27.254.191.157',
    'database'  => '11193',
    'username'  => 'gotowin',
    'password'  => 'Fdm^;bog-91',
    'charset' => 'utf8',
    'collation' => 'utf8_general_ci',
    'prefix'    => '',
    'strict'    => false,
],
'db11195' => [
    'driver'    => 'mysql',
    'host'      => '27.254.191.157',
    'database'  => '11195',
    'username'  => 'gotowin',
    'password'  => 'Fdm^;bog-91',
    'charset' => 'utf8',
    'collation' => 'utf8_general_ci',
    'prefix'    => '',
    'strict'    => false,
],
'db11197' => [
    'driver'    => 'mysql',
    'host'      => '27.254.191.157',
    'database'  => '11197',
    'username'  => 'gotowin',
    'password'  => 'Fdm^;bog-91',
    'charset' => 'utf8',
    'collation' => 'utf8_general_ci',
    'prefix'    => '',
    'strict'    => false,
],
'db11198' => [
    'driver'    => 'mysql',
    'host'      => '27.254.191.157',
    'database'  => '11198',
    'username'  => 'gotowin',
    'password'  => 'Fdm^;bog-91',
    'charset' => 'utf8',
    'collation' => 'utf8_general_ci',
    'prefix'    => '',
    'strict'    => false,
],
'db11199' => [
    'driver'    => 'mysql',
    'host'      => '27.254.191.157',
    'database'  => '11199',
    'username'  => 'gotowin',
    'password'  => 'Fdm^;bog-91',
    'charset' => 'utf8',
    'collation' => 'utf8_general_ci',
    'prefix'    => '',
    'strict'    => false,
],
'db11200' => [
    'driver'    => 'mysql',
    'host'      => '27.254.191.157',
    'database'  => '11200',
    'username'  => 'gotowin',
    'password'  => 'Fdm^;bog-91',
    'charset' => 'utf8',
    'collation' => 'utf8_general_ci',
    'prefix'    => '',
    'strict'    => false,
],
'db11201' => [
    'driver'    => 'mysql',
    'host'      => '27.254.191.157',
    'database'  => '11201',
    'username'  => 'gotowin',
    'password'  => 'Fdm^;bog-91',
    'charset' => 'utf8',
    'collation' => 'utf8_general_ci',
    'prefix'    => '',
    'strict'    => false,
],
'db11202' => [
    'driver'    => 'mysql',
    'host'      => '27.254.191.157',
    'database'  => '11202',
    'username'  => 'gotowin',
    'password'  => 'Fdm^;bog-91',
    'charset' => 'utf8',
    'collation' => 'utf8_general_ci',
    'prefix'    => '',
    'strict'    => false,
],
'db11203' => [
    'driver'    => 'mysql',
    'host'      => '27.254.191.157',
    'database'  => '11203',
    'username'  => 'gotowin',
    'password'  => 'Fdm^;bog-91',
    'charset' => 'utf8',
    'collation' => 'utf8_general_ci',
    'prefix'    => '',
    'strict'    => false,
],
'db11206' => [
    'driver'    => 'mysql',
    'host'      => '27.254.191.157',
    'database'  => '11206',
    'username'  => 'gotowin',
    'password'  => 'Fdm^;bog-91',
    'charset' => 'utf8',
    'collation' => 'utf8_general_ci',
    'prefix'    => '',
    'strict'    => false,
],
'db11207' => [
    'driver'    => 'mysql',
    'host'      => '27.254.191.157',
    'database'  => '11207',
    'username'  => 'gotowin',
    'password'  => 'Fdm^;bog-91',
    'charset' => 'utf8',
    'collation' => 'utf8_general_ci',
    'prefix'    => '',
    'strict'    => false,
],
'db11208' => [
    'driver'    => 'mysql',
    'host'      => '27.254.191.157',
    'database'  => '11208',
    'username'  => 'gotowin',
    'password'  => 'Fdm^;bog-91',
    'charset' => 'utf8',
    'collation' => 'utf8_general_ci',
    'prefix'    => '',
    'strict'    => false,
],
'db' => [
    'driver'    => 'mysql',
    'host'      => '27.254.191.157',
    'database'  => '',
    'username'  => 'gotowin',
    'password'  => 'Fdm^;bog-91',
    'charset' => 'utf8',
    'collation' => 'utf8_general_ci',
    'prefix'    => '',
    'strict'    => false,
],
'db11625' => [
    'driver'    => 'mysql',
    'host'      => '27.254.191.157',
    'database'  => '11625',
    'username'  => 'gotowin',
    'password'  => 'Fdm^;bog-91',
    'charset' => 'utf8',
    'collation' => 'utf8_general_ci',
    'prefix'    => '',
    'strict'    => false,
],
'db11643' => [
    'driver'    => 'mysql',
    'host'      => '27.254.191.157',
    'database'  => '11643',
    'username'  => 'gotowin',
    'password'  => 'Fdm^;bog-91',
    'charset' => 'utf8',
    'collation' => 'utf8_general_ci',
    'prefix'    => '',
    'strict'    => false,
],
'db15012' => [
    'driver'    => 'mysql',
    'host'      => '27.254.191.157',
    'database'  => '15012',
    'username'  => 'gotowin',
    'password'  => 'Fdm^;bog-91',
    'charset' => 'utf8',
    'collation' => 'utf8_general_ci',
    'prefix'    => '',
    'strict'    => false,
],
'db23736' => [
    'driver'    => 'mysql',
    'host'      => '27.254.191.157',
    'database'  => '23736',
    'username'  => 'gotowin',
    'password'  => 'Fdm^;bog-91',
    'charset' => 'utf8',
    'collation' => 'utf8_general_ci',
    'prefix'    => '',
    'strict'    => false,
],
'db24956' => [
    'driver'    => 'mysql',
    'host'      => '27.254.191.157',
    'database'  => '24956',
    'username'  => 'gotowin',
    'password'  => 'Fdm^;bog-91',
    'charset' => 'utf8',
    'collation' => 'utf8_general_ci',
    'prefix'    => '',
    'strict'    => false,
],
'db25017' => [
    'driver'    => 'mysql',
    'host'      => '27.254.191.157',
    'database'  => '25017',
    'username'  => 'gotowin',
    'password'  => 'Fdm^;bog-91',
    'charset' => 'utf8',
    'collation' => 'utf8_general_ci',
    'prefix'    => '',
    'strict'    => false,
],
'db28823' => [
    'driver'    => 'mysql',
    'host'      => '27.254.191.157',
    'database'  => '28823',
    'username'  => 'gotowin',
    'password'  => 'Fdm^;bog-91',
    'charset' => 'utf8',
    'collation' => 'utf8_general_ci',
    'prefix'    => '',
    'strict'    => false,
],
'db40744' => [
    'driver'    => 'mysql',
    'host'      => '27.254.191.157',
    'database'  => '40744',
    'username'  => 'gotowin',
    'password'  => 'Fdm^;bog-91',
    'charset' => 'utf8',
    'collation' => 'utf8_general_ci',
    'prefix'    => '',
    'strict'    => false,
],
   
'db40745' => [
    'driver'    => 'mysql',
    'host'      => '27.254.191.157',
    'database'  => '40745',
    'username'  => 'gotowin',
    'password'  => 'Fdm^;bog-91',
    'charset' => 'utf8',
    'collation' => 'utf8_general_ci',
    'prefix'    => '',
    'strict'    => false,
],
   
   
       
       
    
       

        'pgsql' => [
            'driver' => 'pgsql',
            'url' => env('DATABASE_URL'),
            'host' => env('DB_HOST', '127.0.0.1'),
            'port' => env('DB_PORT', '5432'),
            'database' => env('DB_DATABASE', 'forge'),
            'username' => env('DB_USERNAME', 'forge'),
            'password' => env('DB_PASSWORD', ''),
            'charset' => 'utf8',
            'prefix' => '',
            'prefix_indexes' => true,
            'schema' => 'public',
            'sslmode' => 'prefer',
        ],

        'sqlsrv' => [
            'driver' => 'sqlsrv',
            'url' => env('DATABASE_URL'),
            'host' => env('DB_HOST', 'localhost'),
            'port' => env('DB_PORT', '1433'),
            'database' => env('DB_DATABASE', 'forge'),
            'username' => env('DB_USERNAME', 'forge'),
            'password' => env('DB_PASSWORD', ''),
            'charset' => 'utf8',
            'prefix' => '',
            'prefix_indexes' => true,
        ],

    ],

    /*
    |--------------------------------------------------------------------------
    | Migration Repository Table
    |--------------------------------------------------------------------------
    |
    | This table keeps track of all the migrations that have already run for
    | your application. Using this information, we can determine which of
    | the migrations on disk haven't actually been run in the database.
    |
    */

    'migrations' => 'migrations',

    /*
    |--------------------------------------------------------------------------
    | Redis Databases
    |--------------------------------------------------------------------------
    |
    | Redis is an open source, fast, and advanced key-value store that also
    | provides a richer body of commands than a typical key-value system
    | such as APC or Memcached. Laravel makes it easy to dig right in.
    |
    */

    'redis' => [

        'client' => env('REDIS_CLIENT', 'phpredis'),

        'options' => [
            'cluster' => env('REDIS_CLUSTER', 'redis'),
            'prefix' => env('REDIS_PREFIX', Str::slug(env('APP_NAME', 'laravel'), '_').'_database_'),
        ],

        'default' => [
            'url' => env('REDIS_URL'),
            'host' => env('REDIS_HOST', '127.0.0.1'),
            'password' => env('REDIS_PASSWORD', null),
            'port' => env('REDIS_PORT', '6379'),
            'database' => env('REDIS_DB', '0'),
        ],

        'cache' => [
            'url' => env('REDIS_URL'),
            'host' => env('REDIS_HOST', '127.0.0.1'),
            'password' => env('REDIS_PASSWORD', null),
            'port' => env('REDIS_PORT', '6379'),
            'database' => env('REDIS_CACHE_DB', '1'),
        ],

    ],

];
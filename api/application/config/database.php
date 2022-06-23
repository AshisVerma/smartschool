<?php

defined('BASEPATH') OR exit('No direct script access allowed');


$active_group = 'default';
$query_builder = TRUE;

$uri = $_SERVER['HTTP_HOST'];
$pieces = explode('.', $uri);

$host = $_SERVER['HTTP_HOST']; // Your Sub domain

$number = count($pieces);


if ($number>2) {
  $databasename = 'smartsone_'.$pieces[0];
   
} else {
   
   $databasename = 'schoolmaster';
}

//echo $databasename;exit;

$db['default'] = array(
	'dsn'	=> '',
	'hostname' => 'localhost',
	'username' => 'smartsone',
	'password' => 'd3P3E1Fq2qso',
	'database' => $databasename,
	'dbdriver' => 'mysqli',
	'dbprefix' => '',
	'pconnect' => FALSE,
	'db_debug' => (ENVIRONMENT !== 'production'),
	'cache_on' => FALSE,
	'cachedir' => '',
	'char_set' => 'utf8',
	'dbcollat' => 'utf8_general_ci',
	'swap_pre' => '',
	'encrypt' => FALSE,
	'compress' => FALSE,
	'stricton' => FALSE,
	'failover' => array(),
	'save_queries' => TRUE
);


$db['master'] = array(
	'dsn'	=> '',
	'hostname' => 'localhost',
	'username' => 'smartsone',
	'password' => 'd3P3E1Fq2qso',
	'database' => 'schoolmaster',
	'dbdriver' => 'mysqli',
	'dbprefix' => '',
	'pconnect' => FALSE,
	'db_debug' => (ENVIRONMENT !== 'production'),
	'cache_on' => FALSE,
	'cachedir' => '',
	'char_set' => 'utf8',
	'dbcollat' => 'utf8_general_ci',
	'swap_pre' => '',
	'encrypt' => FALSE,
	'compress' => FALSE,
	'stricton' => FALSE,
	'failover' => array(),
	'save_queries' => TRUE
);



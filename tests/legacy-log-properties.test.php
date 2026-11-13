<?php

error_reporting(E_ALL);
set_error_handler(function ($severity, $message) {
    throw new RuntimeException($message);
});

define('boniPS_VERSION', 'test');

function bonips($type)
{
    return (object) array('format' => array('decimals' => 0));
}

function bonips_apply_defaults($defaults, $args)
{
    return array_merge($defaults, $args);
}

function is_multisite()
{
    return false;
}

function get_transient($key)
{
    return array((object) array('id' => 42));
}

require_once __DIR__ . '/../includes/bonips-log.php';

$query = new class(array('user_id' => 7, 'cache' => 'test')) extends boniPS_Query_Log {
    public function get_pagenum()
    {
        return 1;
    }

    public function table_headers()
    {
        return array();
    }
};

if ($query->diff !== array('user_id' => 7, 'cache' => 'test') || $query->results[0]->id !== 42) {
    throw new RuntimeException('Legacy log queries must preserve argument differences and cached results');
}

echo "Legacy log property tests passed\n";

<?php

require_once '../DB.php';
require_once '../install/names.php';
$db = new DB('mysql', 'localhost', 'sgi_demo', 'demo', 'demo');

$statement = 'INSERT INTO players (name, credits, lifetime_spins, salt) VALUES ';
$placeholders = [];
$values = [];
$num = 20;
for ($x = 0; $x < $num; $x++)
{
    $ind_values = [];
    $ind_values[':name' . $x] = $names[$x];
    $ind_values[':credits' . $x] = rand(10, 2000);
    $ind_values[':lifetime_spins' . $x] = rand(1, 100);
    $ind_values[':salt' . $x] = mcrypt_create_iv(22, MCRYPT_DEV_URANDOM);

    $placeholders[] = '(' . implode(', ', array_keys($ind_values)) . ')';
    $values = array_merge($values, $ind_values);
}

$statement .= implode(', ', $placeholders);

$db->getConnection()->prepare($statement)->execute($values);
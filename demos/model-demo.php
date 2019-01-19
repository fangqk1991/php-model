<?php

include_once __DIR__ . '/ModelMainEx.php';
include_once __DIR__ . '/ModelSubEx.php';


$data = array(
    'xyy' => 1,
    'xxx_yyy' => 'hehehe',
    'xxx' => 'ttt',
    'sub_obj' => array('name' => 'Sub - Obj'),
    'sub_items' => array(
        array('name' => 'Sub - Obj - 1'),
        array('name' => 'Sub - Obj - 2'),
        array('name' => 'Sub - Obj - 3'),
    )
);

$obj = new ModelMainEx();
$obj->fc_generate($data);

var_dump($obj);
var_dump($obj->fc_retMap());
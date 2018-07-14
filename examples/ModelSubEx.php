<?php

include_once __DIR__ . '/../vendor/autoload.php';

use FC\Model\FCModel;

class ModelSubEx extends FCModel
{
    public $name;

    protected function fc_propertyMapper()
    {
        return array(
            'name' => 'name',
        );
    }
}
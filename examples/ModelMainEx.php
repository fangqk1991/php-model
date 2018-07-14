<?php

include_once __DIR__ . '/../vendor/autoload.php';

use FC\Model\FCModel;

class ModelMainEx extends FCModel
{
    // xxx is not in fc_propertyMapper
    public $xxx;

    public $xyy;
    public $xxxYYY;

    public $subObj;
    public $subItems;

    protected function fc_propertyMapper()
    {
        return array(
            'xyy' => 'xyy',
            'xxxYYY' => 'xxx_yyy',
            'subObj' => 'sub_obj',
            'subItems' => 'sub_items',
        );
    }

    protected function fc_propertyClassMapper()
    {
        return array(
            'subObj' => 'ModelSubEx',
        );
    }

    protected function fc_arrayItemClassMapper()
    {
        return array(
            'subItems' => 'ModelSubEx',
        );
    }
}
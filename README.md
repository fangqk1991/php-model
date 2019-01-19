# 简介
JSON / Model 转换模块，PHP 版。

支持基本类型、Model、List[Model] 对象递归转换。

### 其他版本
* [Python 版](https://github.com/fangqk1991/py-model)

### 依赖
* PHP 5.3+
* [Composer](https://getcomposer.org)

### 安装
编辑 `composer.json`，将 `fang/php-model` 加入其中

```
{
  "repositories": [
    {
      "type": "vcs",
      "url": "https://github.com/fangqk1991/php-model"
    }
  ],
  ...
  ...
  "require": {
    "fang/php-model": "0.1.0"
  }
}

```

执行命令

```
composer install
```

### 使用
1. Model 类继承于 `FCModel`
2. 实现 `fc_propertyMapper` 方法，返回 (propName => jsonKey) 的映射字典
3. 如成员需解析为 `FCModel` 类型，实现 `fc_propertyClassMapper` 并声明
4. 如成员需解析为 `List[FCModel]` 类型，实现 `fc_arrayItemClassMapper` 并声明

### 示例
[Demo](https://github.com/fangqk1991/php-model/tree/master/demos)

```
// 简单对象实现
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
```

```
// 复杂对象实现
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
```

```
// model-demo
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
```

![](https://image.fangqk.com/2019-01-19/php-model-demo.jpg)

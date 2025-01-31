<?php
namespace app\components;

use yii\base\Widget;

class MyWidget extends Widget
{
    public $name;

    public function init()
    {
        parent::init();
        if ($this->name === null) {
            $this->name = 'Guest';
        }
    }
    public function run()
    {
        return $this->render('myWidget', ['name' => $this->name]);
    }
}
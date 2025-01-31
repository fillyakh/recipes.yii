<?php
namespace app\components;

use yii\base\Widget;
use app\models\Tag;

class MenuTags extends Widget
{
    private $tags;

    public function init()
    {
        parent::init();
        $this->tags = Tag::find()->all();
    }

    public function run()
    {
        return $this->render('menuTags', ['tags' => $this->tags]);
    }
}
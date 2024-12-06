<?php

namespace app\models;

use Yii;
use yii\web\UploadedFile;

/**
 * This is the model class for table "recipes".
 *
 * @property int $id
 * @property string $name
 * @property string $img
 */
class Recipe extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'recipes';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'description', 'time', 'cooking'], 'required'],
            [['name'], 'string', 'max' => 255],
            [['img'], 'string', 'max' => 100],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'img' => 'Img',
        ];
    }

    public function beforeSave($insert)
    {
        // dd($this->img);
        if (empty($this->img) && !$this->isNewRecord) {
            // Если поле img пустое и это обновление, оставляем старое значение
            $this->img = $this->getOldAttribute('img');
            
        }
        return parent::beforeSave($insert);
    }
}

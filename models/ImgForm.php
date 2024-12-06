<?php
namespace app\models;

use yii\base\Model;
use yii\web\UploadedFile;
use Yii;

class ImgForm extends Model
{
    public $fileImg;
    public $fileName;

    public function rules()
    {
        return [
            ['fileImg', 'file', 'extensions' => ['png', 'jpg', 'jpeg'], 'maxSize' => 1024 * 1024 * 5],
            ['fileImg', 'file', 'skipOnEmpty' => true, 'on' => 'update'],
            ['fileImg', 'file', 'skipOnEmpty' => false, 'on' => 'create'],
        ];
    }
    
    public function upload()
    {
        $this->fileImg = UploadedFile::getInstance($this, 'fileImg');
        $this->validate();
        if (!$this->fileImg){
            return '';
        }
        $this->save();
        return $this->fileName;
    }

    public function save() 
    {  
        $this->generateFileName();  
        $uploadPath = Yii::getAlias('@webroot/img/recipes/') . $this->fileName; 
        $this->fileImg->saveAs($uploadPath);
    }

    public function generateFileName()
    {
        $this->fileName = time() . '.' . $this->fileImg->extension;
    }
}
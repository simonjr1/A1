<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\web\UploadedFile;

/**
 * This is the model class for table "image".
 *
 * @property integer $image_id
 * @property string $image_url
 * @property string $image_heading
 * @property string $image_subheading
 */
class Image extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */

    /**
     * @var UploadedFile
     */
    public $imageFile;

    public function rules()
    {
        return [
            [['image_url', 'image_heading', 'image_subheading'], 'required'],
            [['image_url', 'image_heading', 'image_subheading'], 'string', 'max' => 100],
            [['imageFile'], 'file', 'skipOnEmpty' => false, 'extensions' => 'png, jpg'],
        ];
    }

    public function upload()
    {
        if ($this->validate()) {
            $this->imageFile->saveAs('uploads/' . $this->imageFile->baseName . '.' . $this->imageFile->extension);
            return true;
        } else {
            return false;
        }
    }
    public static function tableName()
    {
        return 'image';
    }

    /**
     * @inheritdoc
     */


    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'image_id' => 'Image ID',
            'image_url' => 'Image Url',
            'image_heading' => 'Image Heading',
            'image_subheading' => 'Image Subheading',
        ];
    }
}

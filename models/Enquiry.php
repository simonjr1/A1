<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "enquiry".
 *
 * @property integer $user_id
 * @property string $username
 * @property string $email
 * @property string $country
 * @property string $arrival_date
 * @property string $departure_date
 */
class Enquiry extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'enquiry';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['username', 'email', 'country', 'arrival_date', 'departure_date'], 'required'],
            [['arrival_date', 'departure_date'], 'safe'],
            [['username', 'email', 'country'], 'string', 'max' => 52],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'user_id' => 'User ID',
            'username' => 'Username',
            'email' => 'Email',
            'country' => 'Country',
            'arrival_date' => 'Arrival Date',
            'departure_date' => 'Departure Date',
        ];
    }
}

<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "weather".
 *
 * @property int $id
 * @property string $date
 * @property string $data
 */
class Weather extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'weather';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['date', 'data'], 'required'],
            [['date'], 'safe'],
            [['data'], 'string'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'date' => Yii::t('app', 'Дата'),
            'data' => Yii::t('app', 'Данные'),
        ];
    }
}

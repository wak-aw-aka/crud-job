<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "job".
 *
 * @property int $id
 * @property int $important
 * @property string $title
 * @property string|null $text
 */
class Job extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'job';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['important', 'title'], 'required'],
            [['important'], 'default', 'value' => null],
            [['important'], 'integer'],
            [['text'], 'string'],
            [['title'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'important' => Yii::t('app', 'Важность'),
            'title' => Yii::t('app', 'Заголовок'),
            'text' => Yii::t('app', 'Описание'),
        ];
    }
}

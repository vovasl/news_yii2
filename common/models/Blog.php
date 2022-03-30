<?php

namespace common\models;

use yii\db\ActiveRecord;
use yii\db\Expression;

/**
 * This is the model class for table "blog".
 *
 * @property int $id
 * @property string $text
 * @property string|null $viewed_time
 */
class Blog extends ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%blog}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['text'], 'required'],
            [['text'], 'string'],
            [['viewed_time'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'text' => 'Текст',
            'viewed_time' => 'Переглянуто',
        ];
    }

    public function updateViewedTime()
    {
        $this->viewed_time = new Expression('NOW()');
        $this->save();
    }

    /**
     * @param string $text
     * @return string
     */
    public static function shuffleWords($text)
    {
        $words = explode( " ", $text);
        shuffle($words);
        return implode(" ", $words);
    }

    public static function checkModelById($model, $id)
    {
        return (!(is_null($model)) && $model->id == $id);
    }

}

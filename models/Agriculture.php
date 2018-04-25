<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "agriculture".
 *
 * @property int $id
 * @property string $title
 *
 * @property Varieties[] $varieties
 */
class Agriculture extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'agriculture';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['title'], 'required'],
            [['title'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'title' => Yii::t('app', 'Title'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getVarieties()
    {
        return $this->hasMany(Varieties::className(), ['agriculture_id' => 'id']);
    }
}

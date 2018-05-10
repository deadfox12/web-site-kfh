<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "pesticide".
 *
 * @property int $id
 * @property string $title
 * @property string $active_substance
 * @property int $norm
 *
 * @property CultivatedFields[] $cultivatedFields
 */
class Pesticide extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'pesticide';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['title'], 'required'],
            [['norm'], 'integer'],
            [['title', 'active_substance'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'title' => Yii::t('app', 'Наименование'),
            'active_substance' => Yii::t('app', 'Активное вещество'),
            'norm' => Yii::t('app', 'Норма расхода'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCultivatedFields()
    {
        return $this->hasMany(CultivatedFields::className(), ['pesticide_id' => 'id']);
    }
}

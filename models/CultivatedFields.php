<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "cultivated_fields".
 *
 * @property int $id
 * @property int $crops_id
 * @property int $pesticide_id
 * @property string $date
 *
 * @property Crops $crops
 * @property Pesticide $pesticide
 */
class CultivatedFields extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'cultivated_fields';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['crops_id', 'pesticide_id', 'date'], 'required'],
            [['crops_id', 'pesticide_id'], 'integer'],
            [['date'], 'safe'],
            [['crops_id'], 'exist', 'skipOnError' => true, 'targetClass' => Crops::className(), 'targetAttribute' => ['crops_id' => 'id']],
            [['pesticide_id'], 'exist', 'skipOnError' => true, 'targetClass' => Pesticide::className(), 'targetAttribute' => ['pesticide_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'crops_id' => Yii::t('app', 'Посев'),
            'pesticide_id' => Yii::t('app', 'Химическое средство'),
            'date' => Yii::t('app', 'Дата посева'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCrops()
    {
        return $this->hasOne(Crops::className(), ['id' => 'crops_id']);
    }

    public function getCropsId()
    {
        return $this->crops->id;
    }

    public function getCropsIdTitle()
    {
        return $this->title;
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPesticide()
    {
        return $this->hasOne(Pesticide::className(), ['id' => 'pesticide_id']);
    }
}

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
            'crops_id' => Yii::t('app', 'Crops ID'),
            'pesticide_id' => Yii::t('app', 'Pesticide ID'),
            'date' => Yii::t('app', 'Date'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCrops()
    {
        return $this->hasOne(Crops::className(), ['id' => 'crops_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPesticide()
    {
        return $this->hasOne(Pesticide::className(), ['id' => 'pesticide_id']);
    }
}

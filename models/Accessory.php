<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "vehicle_accessory".
 *
 * @property int $vehicle_id
 * @property int $accessory_id
 *
 * @property Accessory $accessory
 * @property Vehicle $vehicle
 */
class Accessory extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'vehicle_accessory';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['vehicle_id', 'accessory_id'], 'required'],
            [['vehicle_id', 'accessory_id'], 'integer'],
            [['vehicle_id', 'accessory_id'], 'unique', 'targetAttribute' => ['vehicle_id', 'accessory_id']],
            [['accessory_id'], 'exist', 'skipOnError' => true, 'targetClass' => Accessory::className(), 'targetAttribute' => ['accessory_id' => 'id']],
            [['vehicle_id'], 'exist', 'skipOnError' => true, 'targetClass' => Vehicle::className(), 'targetAttribute' => ['vehicle_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'vehicle_id' => Yii::t('app', 'Vehicle ID'),
            'accessory_id' => Yii::t('app', 'Accessory ID'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAccessory()
    {
        return $this->hasOne(Accessory::className(), ['id' => 'accessory_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getVehicle()
    {
        return $this->hasOne(Vehicle::className(), ['id' => 'vehicle_id']);
    }
}

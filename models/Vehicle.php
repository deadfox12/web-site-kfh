<?php

namespace app\models;

use Yii;
use yii2tech\ar\linkmany\LinkManyBehavior;

/**
 * This is the model class for table "vehicle".
 *
 * @property int $id
 * @property string $title
 * @property int $type_id
 * @property string $reg_number
 * @property int $fuel
 *
 * @property VehicleType $type
 * @property VehicleAccessory[] $vehicleAccessories
 * @property Accessory[] $accessories
 */
class Vehicle extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'vehicle';
    }



    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['title'], 'required'],
            [['type_id', 'fuel'], 'integer'],
            [['title', 'reg_number'], 'string', 'max' => 255],
            [['type_id'], 'exist', 'skipOnError' => true, 'targetClass' => VehicleType::className(), 'targetAttribute' => ['type_id' => 'id']],
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
            'type_id' => Yii::t('app', 'Type ID'),
            'reg_number' => Yii::t('app', 'Reg Number'),
            'fuel' => Yii::t('app', 'Fuel'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getType()
    {
        return $this->hasOne(VehicleType::className(), ['id' => 'type_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getVehicleAccessories()
    {
        return $this->hasMany(VehicleAccessory::className(), ['vehicle_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAccessories()
    {
        return $this->hasMany(Accessory::className(), ['id' => 'accessory_id'])->viaTable('vehicle_accessory', ['vehicle_id' => 'id']);
    }
}

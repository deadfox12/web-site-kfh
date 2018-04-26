<?php

namespace app\models;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "accessory".
 *
 * @property int $id
 * @property string $title
 *
 * @property VehicleAccessory[] $vehicleAccessories
 * @property Vehicle[] $vehicles
 */
class Accessory extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'accessory';
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
            'title' => Yii::t('app', 'Наименование'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getVehicleAccessories()
    {
        return $this->hasMany(VehicleAccessory::className(), ['accessory_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getVehicles()
    {
        return $this->hasMany(Vehicle::className(), ['id' => 'vehicle_id'])->viaTable('vehicle_accessory', ['accessory_id' => 'id']);
    }

    public static function listAll($keyField = 'id', $valueField = 'title', $asArray = true)
    {
        $query = static::find();
        if ($asArray) {
            $query->select([$keyField, $valueField])->asArray();
        }

        return ArrayHelper::map($query->all(), $keyField, $valueField);
    }
}

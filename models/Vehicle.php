<?php

namespace app\models;

use Yii;
use yii\helpers\ArrayHelper;

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
            [['accessory_ids'], 'safe'],
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
            'title' => Yii::t('app', 'Наименование'),
            'type_id' => Yii::t('app', 'Тип сельхозтехники'),
            'reg_number' => Yii::t('app', 'Регистрационный номер'),
            'fuel' => Yii::t('app', 'Расход топлива, г/кВт*ч'),
            'accessory_ids' => Yii::t('app', 'Навесное оборудование'),
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
//    public function getVehicleAccessories()
//    {
//        return $this->hasMany(VehicleAccessory::className(), ['vehicle_id' => 'id']);
//    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAccessories()
    {
        return $this->hasMany(Accessory::className(), ['id' => 'accessory_id'])->viaTable('vehicle_accessory', ['vehicle_id' => 'id']);
    }

    public function behaviors()
    {
        return [
            [
                'class' => \voskobovich\linker\LinkerBehavior::className(),
                'relations' => [
                    'accessory_ids' => 'accessories',
                ],
            ],
        ];
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

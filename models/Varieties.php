<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "varieties".
 *
 * @property int $id
 * @property int $agriculture_id
 * @property string $title
 * @property int $productivity
 *
 * @property Crops[] $crops
 * @property Agriculture $agriculture
 */
class Varieties extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'varieties';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['agriculture_id', 'productivity'], 'integer'],
            [['title', 'productivity'], 'required'],
            [['title'], 'string', 'max' => 255],
            [['agriculture_id'], 'exist', 'skipOnError' => true, 'targetClass' => Agriculture::className(), 'targetAttribute' => ['agriculture_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'agriculture_id' => Yii::t('app', 'Agriculture ID'),
            'title' => Yii::t('app', 'Title'),
            'productivity' => Yii::t('app', 'Productivity'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCrops()
    {
        return $this->hasMany(Crops::className(), ['varieties_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAgriculture()
    {
        return $this->hasOne(Agriculture::className(), ['id' => 'agriculture_id']);
    }
}

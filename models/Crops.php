<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "crops".
 *
 * @property int $id
 * @property int $field_id
 * @property int $varieties_id
 * @property string $date
 *
 * @property Field $field
 * @property Varieties $varieties
 * @property CultivatedFields[] $cultivatedFields
 */
class Crops extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'crops';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['field_id', 'varieties_id'], 'required'],
            [['field_id', 'varieties_id'], 'integer'],
            [['date'], 'safe'],
            [['field_id'], 'exist', 'skipOnError' => true, 'targetClass' => Field::className(), 'targetAttribute' => ['field_id' => 'id']],
            [['varieties_id'], 'exist', 'skipOnError' => true, 'targetClass' => Varieties::className(), 'targetAttribute' => ['varieties_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'field_id' => Yii::t('app', 'Поле'),
            'varieties_id' => Yii::t('app', 'Сорт'),
            'date' => Yii::t('app', 'Дата посева'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getField()
    {
        return $this->hasOne(Field::className(), ['id' => 'field_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getVarieties()
    {
        return $this->hasOne(Varieties::className(), ['id' => 'varieties_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCultivatedFields()
    {
        return $this->hasMany(CultivatedFields::className(), ['crops_id' => 'id']);
    }
}

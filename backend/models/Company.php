<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "company".
 *
 * @property string $id
 * @property string $name
 * @property string $email
 * @property string $address
 * @property string $started_at
 * @property string $created_at
 * @property string $status
 *
 * @property Branch[] $branches
 * @property Department[] $departments
 */
class Company extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'company';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'email', 'address', 'started_at', 'created_at'], 'required'],
            [['started_at', 'created_at'], 'safe'],
            [['status'], 'string'],
            [['name', 'email'], 'string', 'max' => 100],
            [['address'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'email' => 'Email',
            'address' => 'Address',
            'started_at' => 'Started At',
            'created_at' => 'Created At',
            'status' => 'Status',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBranches()
    {
        return $this->hasMany(Branch::className(), ['company_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDepartments()
    {
        return $this->hasMany(Department::className(), ['company_id' => 'id']);
    }
}

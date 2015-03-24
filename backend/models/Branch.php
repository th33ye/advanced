<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "branch".
 *
 * @property string $id
 * @property string $company_id
 * @property string $name
 * @property string $address
 * @property string $created_at
 * @property string $status
 *
 * @property Company $company
 * @property Department[] $departments
 */
class Branch extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'branch';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['company_id', 'name', 'address', 'created_at'], 'required'],
            [['company_id'], 'integer'],
            [['created_at'], 'safe'],
            [['status'], 'string'],
            [['name'], 'string', 'max' => 100],
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
            'company_id' => 'Company Name',
            'name' => 'Branch Name',
            'address' => 'Address',
            'created_at' => 'Created At',
            'status' => 'Status',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCompany()
    {
        return $this->hasOne(Company::className(), ['id' => 'company_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDepartments()
    {
        return $this->hasMany(Department::className(), ['branch_id' => 'id']);
    }
}

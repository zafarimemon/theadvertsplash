<?php

/**
 * This is the model class for table "adunits".
 *
 * The followings are the available columns in table 'adunits':
 * @property integer $unit_id
 * @property string $hash_id
 * @property integer $site_id
 * @property integer $user_id
 * @property string $name
 * @property integer $status
 * @property string $type
 * @property string $banner_size
 * @property string $min_cpc
 * @property string $min_cpv
 * @property string $params
 * @property string $allowed_payments
 * @property string $created_at
 * @property string $updated_at
 */
class Adunits extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'adunits';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('hash_id, site_id, user_id, name, status, type, banner_size, min_cpc, min_cpv, params, allowed_payments, created_at', 'required'),
			array('site_id, user_id, status', 'numerical', 'integerOnly'=>true),
			array('hash_id, name, type, banner_size, allowed_payments', 'length', 'max'=>255),
			array('min_cpc, min_cpv', 'length', 'max'=>10),
			array('updated_at', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('unit_id, hash_id, site_id, user_id, name, status, type, banner_size, min_cpc, min_cpv, params, allowed_payments, created_at, updated_at', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'unit_id' => 'Unit',
			'hash_id' => 'Hash',
			'site_id' => 'Site',
			'user_id' => 'User',
			'name' => 'Name',
			'status' => 'Status',
			'type' => 'Type',
			'banner_size' => 'Banner Size',
			'min_cpc' => 'Min Cpc',
			'min_cpv' => 'Min Cpv',
			'params' => 'Params',
			'allowed_payments' => 'Allowed Payments',
			'created_at' => 'Created At',
			'updated_at' => 'Updated At',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 *
	 * Typical usecase:
	 * - Initialize the model fields with values from filter form.
	 * - Execute this method to get CActiveDataProvider instance which will filter
	 * models according to data in model fields.
	 * - Pass data provider to CGridView, CListView or any similar widget.
	 *
	 * @return CActiveDataProvider the data provider that can return the models
	 * based on the search/filter conditions.
	 */
	public function search()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('unit_id',$this->unit_id);
		$criteria->compare('hash_id',$this->hash_id,true);
		$criteria->compare('site_id',$this->site_id);
		$criteria->compare('user_id',$this->user_id);
		$criteria->compare('name',$this->name,true);
		$criteria->compare('status',$this->status);
		$criteria->compare('type',$this->type,true);
		$criteria->compare('banner_size',$this->banner_size,true);
		$criteria->compare('min_cpc',$this->min_cpc,true);
		$criteria->compare('min_cpv',$this->min_cpv,true);
		$criteria->compare('params',$this->params,true);
		$criteria->compare('allowed_payments',$this->allowed_payments,true);
		$criteria->compare('created_at',$this->created_at,true);
		$criteria->compare('updated_at',$this->updated_at,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Adunits the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}

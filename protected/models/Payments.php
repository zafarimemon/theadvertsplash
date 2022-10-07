<?php

/**
 * This is the model class for table "payments".
 *
 * The followings are the available columns in table 'payments':
 * @property integer $payment_id
 * @property string $payment_hid
 * @property integer $user_id
 * @property string $gateway
 * @property string $currency
 * @property string $amount
 * @property string $description
 * @property string $payment_data
 * @property string $created_at
 */
class Payments extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'payments';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('payment_hid, user_id, gateway, currency, amount, description, created_at', 'required'),
			array('user_id', 'numerical', 'integerOnly'=>true),
			array('payment_hid', 'length', 'max'=>32),
			array('gateway, currency', 'length', 'max'=>255),
			array('amount', 'length', 'max'=>10),
			array('payment_data', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('payment_id, payment_hid, user_id, gateway, currency, amount, description, payment_data, created_at', 'safe', 'on'=>'search'),
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
			'payment_id' => 'Payment',
			'payment_hid' => 'Payment Hid',
			'user_id' => 'User',
			'gateway' => 'Gateway',
			'currency' => 'Currency',
			'amount' => 'Amount',
			'description' => 'Description',
			'payment_data' => 'Payment Data',
			'created_at' => 'Created At',
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

		$criteria->compare('payment_id',$this->payment_id);
		$criteria->compare('payment_hid',$this->payment_hid,true);
		$criteria->compare('user_id',$this->user_id);
		$criteria->compare('gateway',$this->gateway,true);
		$criteria->compare('currency',$this->currency,true);
		$criteria->compare('amount',$this->amount,true);
		$criteria->compare('description',$this->description,true);
		$criteria->compare('payment_data',$this->payment_data,true);
		$criteria->compare('created_at',$this->created_at,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Payments the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}

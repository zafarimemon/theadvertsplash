<?php

/**
 * This is the model class for table "payouts".
 *
 * The followings are the available columns in table 'payouts':
 * @property integer $id
 * @property integer $user_id
 * @property string $status
 * @property string $payout_gateway
 * @property string $payout_account
 * @property string $amount
 * @property string $currency
 * @property string $details
 * @property string $created_at
 * @property string $completed_at
 */
class Payouts extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'payouts';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('user_id, status, payout_gateway, payout_account, amount, currency, details, created_at', 'required'),
			array('user_id', 'numerical', 'integerOnly'=>true),
			array('status, payout_gateway', 'length', 'max'=>100),
			array('payout_account, currency', 'length', 'max'=>255),
			array('amount', 'length', 'max'=>10),
			array('completed_at', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, user_id, status, payout_gateway, payout_account, amount, currency, details, created_at, completed_at', 'safe', 'on'=>'search'),
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
			'id' => 'ID',
			'user_id' => 'User',
			'status' => 'Status',
			'payout_gateway' => 'Payout Gateway',
			'payout_account' => 'Payout Account',
			'amount' => 'Amount',
			'currency' => 'Currency',
			'details' => 'Details',
			'created_at' => 'Created At',
			'completed_at' => 'Completed At',
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

		$criteria->compare('id',$this->id);
		$criteria->compare('user_id',$this->user_id);
		$criteria->compare('status',$this->status,true);
		$criteria->compare('payout_gateway',$this->payout_gateway,true);
		$criteria->compare('payout_account',$this->payout_account,true);
		$criteria->compare('amount',$this->amount,true);
		$criteria->compare('currency',$this->currency,true);
		$criteria->compare('details',$this->details,true);
		$criteria->compare('created_at',$this->created_at,true);
		$criteria->compare('completed_at',$this->completed_at,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Payouts the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}

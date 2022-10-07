<?php

/**
 * This is the model class for table "users".
 *
 * The followings are the available columns in table 'users':
 * @property integer $id
 * @property string $username
 * @property string $name
 * @property string $email
 * @property string $password
 * @property string $confirmpassword
 * @property string $number
 * @property string $whatsapp
 * @property string $facebook
 * @property string $skype
 * @property string $registeras
 * @property string $websiteurl
 * @property string $emailactivation
 * @property string $role
 * @property string $subrole
 * @property integer $status
 * @property string $status_message
 * @property string $webmaster_balance
 * @property string $advertiser_balance
 * @property string $reset_pass_token
 * @property string $register_date
 * @property string $percentage
 */
class Users extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'users';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('username, name, email', 'required'),
			array('status', 'numerical', 'integerOnly'=>true),
			array('username, name, email, password, confirmpassword, number, whatsapp, facebook, skype, registeras, websiteurl, emailactivation, role, subrole, reset_pass_token, percentage', 'length', 'max'=>255),
			array('webmaster_balance, advertiser_balance', 'length', 'max'=>12),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, username, name, email, password, confirmpassword, number, whatsapp, facebook, skype, registeras, websiteurl, emailactivation, role, subrole, status, status_message, webmaster_balance, advertiser_balance, reset_pass_token, register_date, percentage', 'safe', 'on'=>'search'),
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
			'siteCount' => array(self::STAT, 'StatAdunits', 'user_id'),
			'totalSite' => array(self::STAT, 'Sites', 'user_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'username' => 'Username',
			'name' => 'Name',
			'email' => 'Email',
			'password' => 'Password',
			'confirmpassword' => 'Confirmpassword',
			'number' => 'Number',
			'whatsapp' => 'Whatsapp',
			'facebook' => 'Facebook',
			'skype' => 'Skype',
			'registeras' => 'Registeras',
			'websiteurl' => 'Websiteurl',
			'emailactivation' => 'Emailactivation',
			'role' => 'Role',
			'subrole' => 'Subrole',
			'status' => 'Status',
			'status_message' => 'Status Message',
			'webmaster_balance' => 'Webmaster Balance',
			'advertiser_balance' => 'Advertiser Balance',
			'reset_pass_token' => 'Reset Pass Token',
			'register_date' => 'Register Date',
			'percentage' => 'Percentage',
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
		$criteria->compare('username',$this->username,true);
		$criteria->compare('name',$this->name,true);
		$criteria->compare('email',$this->email,true);
		$criteria->compare('password',$this->password,true);
		$criteria->compare('confirmpassword',$this->confirmpassword,true);
		$criteria->compare('number',$this->number,true);
		$criteria->compare('whatsapp',$this->whatsapp,true);
		$criteria->compare('facebook',$this->facebook,true);
		$criteria->compare('skype',$this->skype,true);
		$criteria->compare('registeras',$this->registeras,true);
		$criteria->compare('websiteurl',$this->websiteurl,true);
		$criteria->compare('emailactivation',$this->emailactivation,true);
		$criteria->compare('role',$this->role,true);
		$criteria->compare('subrole',$this->subrole,true);
		$criteria->compare('status',$this->status);
		$criteria->compare('status_message',$this->status_message,true);
		$criteria->compare('webmaster_balance',$this->webmaster_balance,true);
		$criteria->compare('advertiser_balance',$this->advertiser_balance,true);
		$criteria->compare('reset_pass_token',$this->reset_pass_token,true);
		$criteria->compare('register_date',$this->register_date,true);
		$criteria->compare('percentage',$this->percentage,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Users the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}

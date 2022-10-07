<?php

/**
 * This is the model class for table "sites".
 *
 * The followings are the available columns in table 'sites':
 * @property integer $site_id
 * @property integer $user_id
 * @property integer $isolated
 * @property integer $status
 * @property string $status_message
 * @property string $domain
 * @property string $theme
 * @property string $allowed_camp_themes
 * @property string $stat_url
 * @property string $stat_login
 * @property string $stat_password
 * @property string $created_at
 * @property string $updated_at
 */
class Sites extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'sites';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('user_id, isolated, status, status_message, domain, theme, allowed_camp_themes, stat_url, stat_login, stat_password, created_at, updated_at', 'required'),
			array('user_id, isolated, status', 'numerical', 'integerOnly'=>true),
			array('domain, theme', 'length', 'max'=>255),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('site_id, user_id, isolated, status, status_message, domain, theme, allowed_camp_themes, stat_url, stat_login, stat_password, created_at, updated_at', 'safe', 'on'=>'search'),
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
			'user' => array(self::BELONGS_TO, 'Users','user_id'),
			//'reminderLettersCount' => array(self::STAT, 'ReminderLetters', 'booking_id'),
			//'customer' => array(self::BELONGS_TO, 'Customers', 'customer_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'site_id' => 'Site',
			'user_id' => 'User',
			'isolated' => 'Isolated',
			'status' => 'Status',
			'status_message' => 'Status Message',
			'domain' => 'Domain',
			'theme' => 'Theme',
			'allowed_camp_themes' => 'Allowed Camp Themes',
			'stat_url' => 'Stat Url',
			'stat_login' => 'Stat Login',
			'stat_password' => 'Stat Password',
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

		$criteria->compare('site_id',$this->site_id);
		$criteria->compare('user_id',$this->user_id);
		$criteria->compare('isolated',$this->isolated);
		$criteria->compare('status',$this->status);
		$criteria->compare('status_message',$this->status_message,true);
		$criteria->compare('domain',$this->domain,true);
		$criteria->compare('theme',$this->theme,true);
		$criteria->compare('allowed_camp_themes',$this->allowed_camp_themes,true);
		$criteria->compare('stat_url',$this->stat_url,true);
		$criteria->compare('stat_login',$this->stat_login,true);
		$criteria->compare('stat_password',$this->stat_password,true);
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
	 * @return Sites the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}

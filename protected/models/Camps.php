<?php

/**
 * This is the model class for table "camps".
 *
 * The followings are the available columns in table 'camps':
 * @property integer $id
 * @property integer $user_id
 * @property integer $isolated
 * @property integer $status
 * @property string $name
 * @property string $type
 * @property string $theme
 * @property string $allowed_site_themes
 * @property string $start_date
 * @property string $end_date
 * @property string $days
 * @property string $hours
 * @property string $geos
 * @property string $devs
 * @property string $platforms
 * @property string $browsers
 * @property string $created_at
 * @property string $updated_at
 */
class Camps extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'camps';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('user_id, status, name, type, theme, allowed_site_themes, start_date, end_date, days, hours, geos, devs, platforms, browsers, created_at', 'required'),
			array('user_id, isolated, status', 'numerical', 'integerOnly'=>true),
			array('name, type, theme, days, hours, devs', 'length', 'max'=>255),
			array('updated_at', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, user_id, isolated, status, name, type, theme, allowed_site_themes, start_date, end_date, days, hours, geos, devs, platforms, browsers, created_at, updated_at', 'safe', 'on'=>'search'),
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
			'isolated' => 'Isolated',
			'status' => 'Status',
			'name' => 'Name',
			'type' => 'Type',
			'theme' => 'Theme',
			'allowed_site_themes' => 'Allowed Site Themes',
			'start_date' => 'Start Date',
			'end_date' => 'End Date',
			'days' => 'Days',
			'hours' => 'Hours',
			'geos' => 'Geos',
			'devs' => 'Devs',
			'platforms' => 'Platforms',
			'browsers' => 'Browsers',
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

		$criteria->compare('id',$this->id);
		$criteria->compare('user_id',$this->user_id);
		$criteria->compare('isolated',$this->isolated);
		$criteria->compare('status',$this->status);
		$criteria->compare('name',$this->name,true);
		$criteria->compare('type',$this->type,true);
		$criteria->compare('theme',$this->theme,true);
		$criteria->compare('allowed_site_themes',$this->allowed_site_themes,true);
		$criteria->compare('start_date',$this->start_date,true);
		$criteria->compare('end_date',$this->end_date,true);
		$criteria->compare('days',$this->days,true);
		$criteria->compare('hours',$this->hours,true);
		$criteria->compare('geos',$this->geos,true);
		$criteria->compare('devs',$this->devs,true);
		$criteria->compare('platforms',$this->platforms,true);
		$criteria->compare('browsers',$this->browsers,true);
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
	 * @return Camps the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}

<?php

/**
 * This is the model class for table "stat_adunits".
 *
 * The followings are the available columns in table 'stat_adunits':
 * @property integer $id
 * @property integer $unit_id
 * @property integer $user_id
 * @property integer $site_id
 * @property string $ad_requests
 * @property string $matched_requests
 * @property integer $views
 * @property integer $clicks
 * @property string $ctr
 * @property string $cpm
 * @property string $profit
 * @property string $date
 */
class StatAdunits extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'stat_adunits';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('unit_id, user_id, site_id, views, clicks, ctr, cpm, profit, date', 'required'),
			array('unit_id, user_id, site_id, views, clicks', 'numerical', 'integerOnly'=>true),
			array('ad_requests, matched_requests', 'length', 'max'=>255),
			array('ctr', 'length', 'max'=>5),
			array('cpm, profit', 'length', 'max'=>12),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, unit_id, user_id, site_id, ad_requests, matched_requests, views, clicks, ctr, cpm, profit, date', 'safe', 'on'=>'search'),
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
			'unit_id' => 'Unit',
			'user_id' => 'User',
			'site_id' => 'Site',
			'ad_requests' => 'Ad Requests',
			'matched_requests' => 'Matched Requests',
			'views' => 'Views',
			'clicks' => 'Clicks',
			'ctr' => 'Ctr',
			'cpm' => 'Cpm',
			'profit' => 'Profit',
			'date' => 'Date',
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
		$criteria->compare('unit_id',$this->unit_id);
		$criteria->compare('user_id',$this->user_id);
		$criteria->compare('site_id',$this->site_id);
		$criteria->compare('ad_requests',$this->ad_requests,true);
		$criteria->compare('matched_requests',$this->matched_requests,true);
		$criteria->compare('views',$this->views);
		$criteria->compare('clicks',$this->clicks);
		$criteria->compare('ctr',$this->ctr,true);
		$criteria->compare('cpm',$this->cpm,true);
		$criteria->compare('profit',$this->profit,true);
		$criteria->compare('date',$this->date,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return StatAdunits the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}

<?php

/**
 * This is the model class for table "stat_ads".
 *
 * The followings are the available columns in table 'stat_ads':
 * @property integer $id
 * @property integer $ad_id
 * @property integer $user_id
 * @property integer $camp_id
 * @property integer $views
 * @property integer $clicks
 * @property string $ctr
 * @property string $cpm
 * @property string $costs
 * @property string $date
 */
class StatAds extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'stat_ads';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('ad_id, user_id, camp_id, views, clicks, ctr, cpm, costs, date', 'required'),
			array('ad_id, user_id, camp_id, views, clicks', 'numerical', 'integerOnly'=>true),
			array('ctr', 'length', 'max'=>5),
			array('cpm, costs', 'length', 'max'=>12),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, ad_id, user_id, camp_id, views, clicks, ctr, cpm, costs, date', 'safe', 'on'=>'search'),
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
			'ad_id' => 'Ad',
			'user_id' => 'User',
			'camp_id' => 'Camp',
			'views' => 'Views',
			'clicks' => 'Clicks',
			'ctr' => 'Ctr',
			'cpm' => 'Cpm',
			'costs' => 'Costs',
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
		$criteria->compare('ad_id',$this->ad_id);
		$criteria->compare('user_id',$this->user_id);
		$criteria->compare('camp_id',$this->camp_id);
		$criteria->compare('views',$this->views);
		$criteria->compare('clicks',$this->clicks);
		$criteria->compare('ctr',$this->ctr,true);
		$criteria->compare('cpm',$this->cpm,true);
		$criteria->compare('costs',$this->costs,true);
		$criteria->compare('date',$this->date,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return StatAds the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}

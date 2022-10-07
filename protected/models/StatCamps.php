<?php

/**
 * This is the model class for table "stat_camps".
 *
 * The followings are the available columns in table 'stat_camps':
 * @property integer $id
 * @property integer $camp_id
 * @property integer $user_id
 * @property integer $views
 * @property integer $clicks
 * @property string $ctr
 * @property string $cpm
 * @property string $costs
 * @property string $date
 */
class StatCamps extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'stat_camps';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('camp_id, user_id, views, clicks, ctr, cpm, costs, date', 'required'),
			array('camp_id, user_id, views, clicks', 'numerical', 'integerOnly'=>true),
			array('ctr', 'length', 'max'=>5),
			array('cpm, costs', 'length', 'max'=>12),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, camp_id, user_id, views, clicks, ctr, cpm, costs, date', 'safe', 'on'=>'search'),
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
			'camp_id' => 'Camp',
			'user_id' => 'User',
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
		$criteria->compare('camp_id',$this->camp_id);
		$criteria->compare('user_id',$this->user_id);
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
	 * @return StatCamps the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}

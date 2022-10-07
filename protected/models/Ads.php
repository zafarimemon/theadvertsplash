<?php

/**
 * This is the model class for table "ads".
 *
 * The followings are the available columns in table 'ads':
 * @property integer $ad_id
 * @property string $hash_id
 * @property integer $user_id
 * @property integer $camp_id
 * @property integer $status
 * @property string $status_message
 * @property string $type
 * @property string $title
 * @property string $description
 * @property string $filename
 * @property integer $img_width
 * @property integer $img_height
 * @property string $img_wh
 * @property string $ad_url
 * @property string $action_text
 * @property integer $views
 * @property integer $clicks
 * @property string $ctr
 * @property string $cpm
 * @property string $costs
 * @property string $payment_mode
 * @property string $cpc
 * @property string $cpv
 * @property string $created_at
 * @property string $updated_at
 */
class Ads extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'ads';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('hash_id, user_id, camp_id, status, status_message, type, title, description, filename, img_width, img_height, img_wh, ad_url, action_text, views, clicks, ctr, cpm, costs, payment_mode, cpc, cpv, created_at', 'required'),
			array('user_id, camp_id, status, img_width, img_height, views, clicks', 'numerical', 'integerOnly'=>true),
			array('hash_id, type, img_wh, action_text, payment_mode', 'length', 'max'=>255),
			array('filename', 'length', 'max'=>100),
			array('ctr', 'length', 'max'=>5),
			array('cpm, costs', 'length', 'max'=>12),
			array('cpc, cpv', 'length', 'max'=>10),
			array('updated_at', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('ad_id, hash_id, user_id, camp_id, status, status_message, type, title, description, filename, img_width, img_height, img_wh, ad_url, action_text, views, clicks, ctr, cpm, costs, payment_mode, cpc, cpv, created_at, updated_at', 'safe', 'on'=>'search'),
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
			'ad_id' => 'Ad',
			'hash_id' => 'Hash',
			'user_id' => 'User',
			'camp_id' => 'Camp',
			'status' => 'Status',
			'status_message' => 'Status Message',
			'type' => 'Type',
			'title' => 'Title',
			'description' => 'Description',
			'filename' => 'Filename',
			'img_width' => 'Img Width',
			'img_height' => 'Img Height',
			'img_wh' => 'Img Wh',
			'ad_url' => 'Ad Url',
			'action_text' => 'Action Text',
			'views' => 'Views',
			'clicks' => 'Clicks',
			'ctr' => 'Ctr',
			'cpm' => 'Cpm',
			'costs' => 'Costs',
			'payment_mode' => 'Payment Mode',
			'cpc' => 'Cpc',
			'cpv' => 'Cpv',
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

		$criteria->compare('ad_id',$this->ad_id);
		$criteria->compare('hash_id',$this->hash_id,true);
		$criteria->compare('user_id',$this->user_id);
		$criteria->compare('camp_id',$this->camp_id);
		$criteria->compare('status',$this->status);
		$criteria->compare('status_message',$this->status_message,true);
		$criteria->compare('type',$this->type,true);
		$criteria->compare('title',$this->title,true);
		$criteria->compare('description',$this->description,true);
		$criteria->compare('filename',$this->filename,true);
		$criteria->compare('img_width',$this->img_width);
		$criteria->compare('img_height',$this->img_height);
		$criteria->compare('img_wh',$this->img_wh,true);
		$criteria->compare('ad_url',$this->ad_url,true);
		$criteria->compare('action_text',$this->action_text,true);
		$criteria->compare('views',$this->views);
		$criteria->compare('clicks',$this->clicks);
		$criteria->compare('ctr',$this->ctr,true);
		$criteria->compare('cpm',$this->cpm,true);
		$criteria->compare('costs',$this->costs,true);
		$criteria->compare('payment_mode',$this->payment_mode,true);
		$criteria->compare('cpc',$this->cpc,true);
		$criteria->compare('cpv',$this->cpv,true);
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
	 * @return Ads the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}

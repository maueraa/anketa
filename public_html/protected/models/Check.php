<?php

/**
 * This is the model class for table "{{check}}".
 *
 * The followings are the available columns in table '{{check}}':
 * @property integer $id
 * @property integer $student_id
 * @property integer $variation_id
 * @property string $measure_type
 */
class Check extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return '{{check}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			//array('name','required'),
			array('student_id, variation_id', 'numerical', 'integerOnly'=>true),
			array('measure_type', 'length', 'max'=>1),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, student_id, variation_id, measure_type', 'safe', 'on'=>'search'),
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
			'id' => Yii::t('strings','ID'),
			'student_id' => Yii::t('strings','Student'),
			'variation_id' => Yii::t('strings','Variation'),
			'measure_type' => Yii::t('strings','Measure Type'),
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
		$criteria->compare('student_id',$this->student_id);
		$criteria->compare('variation_id',$this->variation_id);
		$criteria->compare('measure_type',$this->measure_type,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Check the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}

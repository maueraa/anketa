<?php

/**
 * This is the model class for table "{{variation}}".
 *
 * The followings are the available columns in table '{{variation}}':
 * @property integer $id
 * @property string $brief
 * @property string $detail1
 * @property string $detail2
 * @property integer $check_type
 * @property string $test
 */
class Variation extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return '{{variation}}';
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
			array('check_type', 'numerical', 'integerOnly'=>true),
			array('brief, detail1, detail2, test', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, brief, detail1, detail2, check_type, test', 'safe', 'on'=>'search'),
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
			'brief' => Yii::t('strings','Brief'),
			'detail1' => Yii::t('strings','Detail1'),
			'detail2' => Yii::t('strings','Detail2'),
			'check_type' => Yii::t('strings','Check Type'),
			'test' => Yii::t('strings','Test'),
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
		$criteria->compare('brief',$this->brief,true);
		$criteria->compare('detail1',$this->detail1,true);
		$criteria->compare('detail2',$this->detail2,true);
		$criteria->compare('check_type',$this->check_type);
		$criteria->compare('test',$this->test,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Variation the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}

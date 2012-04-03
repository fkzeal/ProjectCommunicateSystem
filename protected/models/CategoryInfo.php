<?php

/**
 * This is the model class for table "category_info".
 *
 * The followings are the available columns in table 'category_info':
 * @property integer $ID
 * @property string $FirstLevel
 * @property string $SecondLevel
 * @property string $Flag
 *
 * The followings are the available model relations:
 * @property AppCodeCategory[] $appCodeCategories
 */
class CategoryInfo extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return CategoryInfo the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'category_info';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('FirstLevel, Flag', 'required'),
			array('FirstLevel, SecondLevel', 'length', 'max'=>16),
			array('Flag', 'length', 'max'=>2),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('ID, FirstLevel, SecondLevel, Flag', 'safe', 'on'=>'search'),
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
			'appCodeCategory' => array(self::HAS_MANY, 'AppCodeCategory', 'CategoryID'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'ID' => 'ID',
			'FirstLevel' => 'First Level',
			'SecondLevel' => 'Second Level',
			'Flag' => 'Flag',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
	 */
	public function search()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('ID',$this->ID);
		$criteria->compare('FirstLevel',$this->FirstLevel,true);
		$criteria->compare('SecondLevel',$this->SecondLevel,true);
		$criteria->compare('Flag',$this->Flag,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}
<?php

/**
 * This is the model class for table "code_tag".
 *
 * The followings are the available columns in table 'code_tag':
 * @property integer $ID
 * @property integer $CodeID
 * @property integer $TagID
 *
 * The followings are the available model relations:
 * @property ProjectCode $code
 * @property TagInfo $tag
 */
class CodeTag extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return CodeTag the static model class
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
		return 'code_tag';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('CodeID, TagID', 'required'),
			array('CodeID, TagID', 'numerical', 'integerOnly'=>true),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('ID, CodeID, TagID', 'safe', 'on'=>'search'),
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
			'code' => array(self::BELONGS_TO, 'ProjectCode', 'CodeID'),
			'tag' => array(self::BELONGS_TO, 'TagInfo', 'TagID'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'ID' => 'ID',
			'CodeID' => 'Code',
			'TagID' => 'Tag',
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
		$criteria->compare('CodeID',$this->CodeID);
		$criteria->compare('TagID',$this->TagID);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}
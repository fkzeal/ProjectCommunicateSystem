<?php

/**
 * This is the model class for table "project_code".
 *
 * The followings are the available columns in table 'project_code':
 * @property integer $ID
 * @property integer $ProjectID
 * @property double $CodeScore
 * @property integer $CodeDownloadTimes
 * @property string $CodeDescription
 * @property string $CodeFragment
 *
 * The followings are the available model relations:
 * @property Project $project
 */
class ProjectCode extends CActiveRecord
{
    public $CodeFile;
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return ProjectCode the static model class
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
		return 'project_code';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
//			array('ProjectID', 'required'),
//			array('ProjectID, CodeDownloadTimes', 'numerical', 'integerOnly'=>true),
//			array('CodeScore', 'numerical'),
			array('CodeDescription, CodeFragment', 'safe'),
                    array('CodeFile', 'unsafe'),
			array('CodeFile', 'file', 
				  'types'=>'zip,rar',
				  'maxSize'=>1024*1024*1024),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('ID, ProjectID, CodeScore, CodeDownloadTimes, CodeDescription, CodeFragment', 'safe', 'on'=>'search'),
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
			'project' => array(self::BELONGS_TO, 'Project', 'ProjectID'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'ID' => 'ID',
			'ProjectID' => 'Project',
			'CodeScore' => 'Code Score',
			'CodeDownloadTimes' => 'Code Download Times',
			'CodeDescription' => 'Code Description',
			'CodeFragment' => 'Code Fragment',
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
		$criteria->compare('ProjectID',$this->ProjectID);
		$criteria->compare('CodeScore',$this->CodeScore);
		$criteria->compare('CodeDownloadTimes',$this->CodeDownloadTimes);
		$criteria->compare('CodeDescription',$this->CodeDescription,true);
		$criteria->compare('CodeFragment',$this->CodeFragment,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}
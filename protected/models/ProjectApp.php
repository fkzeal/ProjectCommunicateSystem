<?php

/**
 * This is the model class for table "project_app".
 *
 * The followings are the available columns in table 'project_app':
 * @property integer $ID
 * @property double $AppScore
 * @property integer $AppDownloadTimes
 * @property integer $ProjectID
 * @property integer $CategoryID
 *
 * The followings are the available model relations:
 * @property CategoryInfo $category
 * @property TagInfo[] $tags
 * @property Project $project
 */
class ProjectApp extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return ProjectApp the static model class
	 */
    
    public $AppFile;
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'project_app';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
					array('AppFile, CategoryID', 'required'),
                    array('AppFile', 'unsafe'),
					array('AppFile', 'file', 
				  		  'types'=>'apk,exe,app,jar',
				  		  'maxSize'=>1024*1024*50),
					array('ID, AppScore, AppDownloadTimes, ProjectID', 'safe', 'on'=>'search'),
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
			'category' => array(self::BELONGS_TO, 'CategoryInfo', 'CategoryID'),
			'tags' => array(self::MANY_MANY, 'TagInfo', 'app_tag(AppID, TagID)'), 
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'ID' => 'ID',
			'AppScore' => '应用评分',
			'AppDownloadTimes' => '下载次数',
			'ProjectID' => 'Project',
			'AppFile' => '应用文件',
			'CategoryID' => '应用分类',
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
		$criteria->compare('AppScore',$this->AppScore);
		$criteria->compare('AppDownloadTimes',$this->AppDownloadTimes);
		$criteria->compare('ProjectID',$this->ProjectID);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}
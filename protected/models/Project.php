<?php

/**
 * This is the model class for table "project".
 *
 * The followings are the available columns in table 'project':
 * @property integer $ID
 * @property string $ProjectName
 * @property integer $ProjectStatus
 * @property string $ProjectSummary
 * @property string $ProjectDescription
 * @property string $ProjectCreatedTime
 * @property string $ProjectIconPath
 * @property integer $UserID
 * @property string $TeamName
 *
 * The followings are the available model relations:
 * @property User $user
 * @property ProjectApp $projectApps
 * @property ProjectCode $projectCodes
 * @property ProjectComment[] $projectComments
 */
class Project extends CActiveRecord {
    /**
     * Returns the static model of the specified AR class.
     * @param string $className active record class name.
     * @return Project the static model class
     */
    const PUBLISHED = 1;
    const UNPUBLISHED = 0;
    public $ProjectIcon;

    public static function model($className=__CLASS__) {
        return parent::model($className);
    }

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return 'project';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        return array(
            array('ProjectStatus, UserID', 'numerical', 'integerOnly' => true),
            array('ProjectName', 'length', 'max' => 30),
            array('ProjectIconPath', 'length', 'max' => 40),
            array('ProjectName, ProjectSummary, ProjectIcon', 'required'),
            array('ProjectDescription', 'required', 'enableClientValidation'=>false),
      			array('ProjectIcon', 'unsafe'),
      			array('ProjectIcon', 'file',
      				  'types'=>'jpg, gif, png',
                        'allowEmpty' => false,
      				  'maxSize'=>1024*1024*1),
			      array('ProjectName, ProjectSummary, ProjectDescription', 'safe', 'on'=>'search')
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
            'user' => array(self::BELONGS_TO, 'User', 'UserID'),
            'projectApps' => array(self::HAS_ONE, 'ProjectApp', 'ProjectID'),
            'projectCodes' => array(self::HAS_ONE, 'ProjectCode', 'ProjectID'),
            'projectComments' => array(self::HAS_MANY, 'ProjectComment', 'ProjectID'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'ID' => 'ID',
            'ProjectName' => '项目名称',
            'TeamName' => '团队名称',
            'ProjectStatus' => '项目状态',
            'ProjectSummary' => '项目简介',
            'ProjectDescription' => '项目描述',
            'ProjectCreatedTime' => '项目创建时间',
            'ProjectIconPath' => '项目图标路径',
            'UserID' => '用户',
            'ProjectIcon' => '项目图标'
        );
    }

    /**
     * Retrieves a list of models based on the current search/filter conditions.
     * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
     */
    public function search() {
        // Warning: Please modify the following code to remove attributes that
        // should not be searched.

        $criteria = new CDbCriteria;

        $criteria->compare('ID', $this->ID);
        $criteria->compare('ProjectName', $this->ProjectName, true);
        $criteria->compare('ProjectStatus', $this->ProjectStatus);
        $criteria->compare('ProjectSummary', $this->ProjectSummary, true);
        $criteria->compare('ProjectDescription', $this->ProjectDescription, true);
        $criteria->compare('ProjectCreatedTime', $this->ProjectCreatedTime, true);
        $criteria->compare('ProjectIconPath', $this->ProjectIconPath, true);
        $criteria->compare('UserID', $this->UserID);

        return new CActiveDataProvider($this, array(
                    'criteria' => $criteria,
                ));
    }

}
<?php

/**
 * This is the model class for table "project".
 *
 * The followings are the available columns in table 'project':
 * @property integer $ID
 * @property string $ProjectName
 * @property integer $ProjectStatus
 * @property string $ProjectDescription
 * @property string $ProjectCreatedTime
 * @property string $ProjectIconPath
 * @property integer $UserID
 * @property string $TeamName //更改项 新加的团队名称
 *
 * The followings are the available model relations:
 * @property AppCodeCategory[] $appCodeCategories
 * @property AppCodeTag[] $appCodeTags
 * @property User $user
 * @property ProjectApp[] $projectApps
 * @property ProjectCode[] $projectCodes
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
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
//            array('ProjectStatus, ProjectDescription, ProjectCreatedTime, UserID', 'required'),
            array('ProjectStatus, UserID', 'numerical', 'integerOnly' => true),
            array('ProjectName', 'length', 'max' => 30),
            array('ProjectIconPath', 'length', 'max' => 40),
            // The following rule is used by search().
            // Please remove those attributes that should not be searched.
//            array('ID, ProjectName, ProjectStatus, ProjectDescription, ProjectCreatedTime, ProjectIconPath, UserID', 'safe', 'on' => 'search'),
            
            
            array('ProjectName, ProjectDescription', 'required'),
			array('ProjectIcon', 'unsafe'),
			array('ProjectIcon', 'file',
				  'types'=>'jpg, gif, png',
				  'maxSize'=>1024*1024*1),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('ProjectName, ProjectDescription', 'safe', 'on'=>'search')
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
            'appCodeCategories' => array(self::HAS_MANY, 'AppCodeCategory', 'ProjectID'),
            'appCodeTags' => array(self::HAS_MANY, 'AppCodeTag', 'ProjectID'),
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
            'ProjectName' => 'Project Name',
            'ProjectStatus' => 'Project Status',
            'ProjectDescription' => 'Project Description',
            'ProjectCreatedTime' => 'Project Created Time',
            'ProjectIconPath' => 'Project Icon Path',
            'UserID' => 'User',
            'ProjectIcon' => 'Project Icon'
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
        $criteria->compare('ProjectDescription', $this->ProjectDescription, true);
        $criteria->compare('ProjectCreatedTime', $this->ProjectCreatedTime, true);
        $criteria->compare('ProjectIconPath', $this->ProjectIconPath, true);
        $criteria->compare('UserID', $this->UserID);

        return new CActiveDataProvider($this, array(
                    'criteria' => $criteria,
                ));
    }

}
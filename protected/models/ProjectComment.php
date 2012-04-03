<?php

/**
 * This is the model class for table "project_comment".
 *
 * The followings are the available columns in table 'project_comment':
 * @property integer $ID
 * @property string $Content
 * @property integer $ProjectID
 * @property string $Flag
 * @property integer $UserID
 *
 * The followings are the available model relations:
 * @property Project $project
 * @property User $user
 */
class ProjectComment extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return ProjectComment the static model class
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
		return 'project_comment';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('Content, ProjectID, Flag, UserID', 'required'),
			array('ProjectID, UserID', 'numerical', 'integerOnly'=>true),
			array('Flag', 'length', 'max'=>2),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('ID, Content, ProjectID, Flag, UserID', 'safe', 'on'=>'search'),
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
			'user' => array(self::BELONGS_TO, 'User', 'UserID'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'ID' => 'ID',
			'Content' => 'Content',
			'ProjectID' => 'Project',
			'Flag' => 'Flag',
			'UserID' => 'User',
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
		$criteria->compare('Content',$this->Content,true);
		$criteria->compare('ProjectID',$this->ProjectID);
		$criteria->compare('Flag',$this->Flag,true);
		$criteria->compare('UserID',$this->UserID);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}
<?php

/**
 * This is the model class for table "user".
 *
 * The followings are the available columns in table 'user':
 * @property integer $ID
 * @property string $UserName
 * @property string $NickName
 * @property string $Authority
 * @property string $Gender
 * @property integer $DistributionScore
 *
 * The followings are the available model relations:
 * @property Project[] $projects
 */
class User extends CActiveRecord {

    public $confirmPassword;
    public $email;
    public $verifyCode;

    /**
     * Returns the static model of the specified AR class.
     * @param string $className active record class name.
     * @return User the static model class
     */
    public static function model($className=__CLASS__) {
        return parent::model($className);
    }

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return 'user';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
//            array('UserName', 'required', 'message' => '用户名不能为空', 'on' => 'Register'),
//            array('UserName', 'unique', 'message' => '用户名重复', 'on' => 'Register'),
//            array('UserPassword', 'required', 'message' => '密码不能为空'),
//            array('confirmPassword', 'required', 'message' => ''),
//            array('confirmPassword', 'compare', 'compareAttribute' => 'UserPassword',
//                'message' => '两次密码不相同'),
            //array('DistributionScore', 'numerical', 'integerOnly'=>true),
            array('UserName, UserPassword, NickName', 'length', 'max' => 20),
            array(' Gender', 'length', 'max' => 2),
//            array('Birthday', 'date', 'format' => 'yyyy-M-d', 'message' => '请输入有效的 年-月-日'),
            // The following rule is used by search().
            // Please remove those attributes that should not be searched.
            //验证码
            array('verifyCode', 'captcha', 'allowEmpty' => !CCaptcha::checkRequirements()
                , 'message' => '验证码错误'),
            array('ID, UserName, UserPassword, NickName, Authority, Gender, Birthday, DistributionScore', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
            'projects' => array(self::HAS_MANY, 'Project', 'UserID'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'ID' => 'ID',
            'UserName' => '用户名',
            'UserPassword' => '密码',
            'confirmPassword' => '请确认',
            'NickName' => '昵称',
            //'Authority' => 'Authority',
            'Gender' => '性别',
            'Birthday' => '生日',
                //'DistributionScore' => 'Distribution Score',
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
        $criteria->compare('UserName', $this->UserName, true);
//        $criteria->compare('UserPassword', $this->UserPassword, true);
        $criteria->compare('NickName', $this->NickName, true);
        $criteria->compare('Authority', $this->Authority, true);
        $criteria->compare('Gender', $this->Gender, true);
//        $criteria->compare('Birthday', $this->Birthday, true);
        $criteria->compare('DistributionScore', $this->DistributionScore);

        return new CActiveDataProvider($this, array(
                    'criteria' => $criteria,
                ));
    }

}
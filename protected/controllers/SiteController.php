<?php

class SiteController extends Controller {

    /**
     * Declares class-based actions.
     */
    public function actions() {
        return array(
            // captcha action renders the CAPTCHA image displayed on the contact page
            'captcha' => array(
                'class' => 'CCaptchaAction',
                'backColor' => 0xFFFFFF,
            ),
            // page action renders "static" pages stored under 'protected/views/site/pages'
            // They can be accessed via: index.php?r=site/page&view=FileName
            'page' => array(
                'class' => 'CViewAction',
            ),
        );
    }

    public function filters() {
        return array(
            'accessControl', // perform access control for CRUD operations
        );
    }

    public function accessRules() {
        return array(
            array('deny', // allow authenticated user to perform 'create' and 'update' actions
                'actions' => array('login'),
                'users' => array('@'),
                'message' => '您已经登录了，请不要乱点。。。。。。'
            ),
//            array('deny', // allow authenticated user to perform 'create' and 'update' actions
//                'actions' => array('error'),
//                'users' => array('*'),
//                'message' => '请不要乱点。。。。。。'
//            ),
            array('allow', // deny all users
                'users' => array('*'),
            ),
            
        );
    }

    /**
     * This is the default 'index' action that is invoked
     * when an action is not explicitly requested by users.
     */
    public function actionIndex() {
        // renders the view file 'protected/views/site/index.php'
        // using the default layout 'protected/views/layouts/main.php'
        parent::init();

        Yii::app()->clientScript->registerCssFile(Yii::app()->baseUrl . '/GlobalFiles/global.css');
        Yii::app()->clientScript->registerCssFile(Yii::app()->baseUrl . '/css/logo.png');
        // Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl.'/css/my.js')
        // $this->redirect(Yii::app()->createUrl('' ));
        $this->redirect(Yii::app()->createUrl('apphome/index'));
        //$this->render('login', array('error' => $error));
    }

    /**
     * This is the action to handle external exceptions.
     */
    public function actionError() {
        if ($error = Yii::app()->errorHandler->error) {
            

            if (Yii::app()->request->isAjaxRequest)
                echo $error['message'];
            else
                $this->render('error', $error);
        }
    }

    public function actionCheckLogin() {
        
    }

    /**
     * Displays the contact page
     */
    public function actionContact() {
        
        if(isset($_POST['ajax']) && $_POST['ajax']==='contact-form')
          {
          echo CActiveForm::validate($model);
          Yii::app()->end();
          }
          
        $this->layout = "//layouts/no_navi";
        $model = new ContactForm;
        if (isset($_POST['ContactForm'])) {
            $model->attributes = $_POST['ContactForm'];
            if ($model->validate()) {
                $headers = "From: {$model->email}\r\nReply-To: {$model->email}";
                
//                $email = Yii::app()->email;
//$email->to = 'fkzeal@163.com';
//$email->subject =  $model->subject;
//$email->message = $model->body;
//$email->send();


                mail(Yii::app()->params['adminEmail'], $model->subject, $model->body, $headers);
                Yii::app()->user->setFlash('contact', 'Thank you for contacting us. We will respond to you as soon as possible.');
                $this->refresh();
            }
        }
        $this->render('contact', array('model' => $model));
    }

    /**
     * Displays the login page
     */
    public function actionLogin() {
        $this->layout = "//layout/s";
        Yii::app()->clientScript->registerCssFile(Yii::app()->baseUrl . '/css/main.css');

        $cookie = Yii::app()->request->getCookies();
        unset($cookie['loginID']);

        $model = new LoginForm;
        $user;
        // if it is ajax validation request
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'login-form') {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }

        // collect user input data
        if (isset($_POST['LoginForm'])) {
            $model->attributes = $_POST['LoginForm'];
            // validate user input and redirect to the previous page if valid
            if ($model->validate() && $model->login()) {
                $user = User::model()->findByAttributes(array(
                    'UserName' => $model->username
                        ));
//                $cookie = new CHttpCookie('loginID', $user->ID);
//                Yii::app()->request->cookies['loginID'] = $cookie;
                switch (Yii::app()->user->getState('authority')) {
                    case 0:
                        $this->redirect(Yii::app()->createUrl('apphome/index'));
                        break;
                    case 1:
                        $this->redirect(Yii::app()->createUrl('codemain/index'
//                        ,array('id'=>$id)
                                ));
                        break;
                }
//                Yii::app()->user->setReturnUrl(Yii::app()->createUrl('appmain/index'));
//                $id[] = $user->ID;
//                $this->redirect(Yii::app()->createUrl('codemain/index'
////                        ,array('id'=>$id)
//                        ));
//                $this->render('index', array('id'=>$id));
            }
        }
        // display the login form
        $this->render('login', array('model' => $model));
    }

    /**
     * Logs out the current user and redirect to homepage.
     */
    public function actionLogout() {
        Yii::app()->user->logout();
        $this->redirect(Yii::app()->homeUrl);
    }

    public function actionRegister() {
        $model = new User;
        $model->scenario = 'Register';

        // uncomment the following code to enable ajax-based validation
        /*
          if(isset($_POST['ajax']) && $_POST['ajax']==='user-UserForm-form')
          {
          echo CActiveForm::validate($model);
          Yii::app()->end();
          }
         */

        if (isset($_POST['User'])) {
            $model->attributes = $_POST['User'];
            if ($model->validate()) {
                // form inputs are valid, do something here
                $model->UserPassword = $this->encrypt($model->UserPassword);
                if ($model->save(FALSE)) {
                    Yii::app()->user->logout();
                    $this->redirect($this->createUrl('login'));
                } else {
                    //  $model->addError('UserPassword', '表单填写不正确');
                }
            }
        }
        $this->render('UserForm', array('model' => $model));
    }
    
//jia mi
    public function encrypt($value) {
        return md5($value);
    }

    public function actionManageInfo() {
        $model = new User;

        // uncomment the following code to enable ajax-based validation
        /*
          if(isset($_POST['ajax']) && $_POST['ajax']==='user-ManageInfo-form')
          {
          echo CActiveForm::validate($model);
          Yii::app()->end();
          }
         */
        $id = Yii::app()->user->getState('id');
        $user = User::model()->findByPk($id);

        if (isset($_POST['User'])) {
            $model->attributes = $_POST['User'];

//            if ($model->validate(FALSE)) {
                // form inputs are valid, do something here
                $user->attributes = $_POST['User'];
//                $user->UserPassword = $this->encrypt($user->UserPassword);
                if ($user->save(false)) {
                    Yii::app()->user->logout();

                    $this->redirect(array('login'));
                }
//            }
        }
        $this->render('ManageInfo', array('model' => $model, 'user' => $user));
    }
    
    
    public function actionDownLoad()
	{
        if (isset ($_POST['pid'])) {
            $project_id = $_POST['pid'];
        }
        
        if (isset ($_POST['type'])) {
            $type = $_POST['type'];
        }
        
		if($type === 1||$type == 'app'||$type == 'a')
			$project_type="app";
		else
			$project_type="code";

		$dir_name = "protected/data/".$project_id.$project_type;

		$dir_handle = opendir($dir_name) or die("can't open ".$dir_name);

		while($file_name = readdir($dir_handle));

		if($file_name === "."||$file_name === "..")
			return false;


		$file_path = $project_id."/".$project_type."/".$file_name;

		if(!file_exists($file_path))
			return fasle;

		$file_size = filesize($file_path);
		header("Content-type: application/octet-stream;charset=utf-8");
		header("Accept-Ranges: bytes");
		header("Accept-Length: $file_size");
		header("Content-Disposition: attachment; filename=".$file_name);
		$fp = fopen($file_path,"r");
		$buffer_size = 1024;
		$cur_pos = 0;
		while(!feof($fp)&&$file_size-$cur_pos>$buffer_size)
		{										        
			$buffer = fread($fp,$buffer_size);
			echo $buffer;
			$cur_pos += $buffer_size;
		}
		$buffer = fread($fp,$file_size-$cur_pos);
		echo $buffer;
		fclose($fp);
                echo 'success';
		return true;
	}


}
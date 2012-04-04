<?php

class AppHomeController extends Controller
{
	
    public function init(){    
       		parent::init();    
		Yii::app()->clientScript->registerCssFile(Yii::app()->baseUrl.'/HomeFiles/css/Home.css');
		Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl.'/HomeFiles/js/Home.js');

	}
        	public function actionIndex(){

		
		//categories
		$category=CategoryInfo::model()->findAll("Flag=:Flag",array(":Flag"=>"a"));
		
		//9 hotest
		$hotest=ProjectApp::model()->with("project")->findAll(array(
   	 		'order' => 'AppDownloadTimes DESC',
    		'limit' => 9,
		));	
		//9 newest
		$newest=ProjectApp::model()->with("project")->findAll(array(
   	 		'order' => 'ProjectCreatedTime DESC',
    		'limit' => 9,
		));
		//$newest=ProjectApp::model()->with('project')->findall();
		
		$commentHotest=array();
		foreach($hotest as $item){
		$commentHotest[]=ProjectComment::model()->count(
		    'ProjectID=:ProjectID AND Flag=:Flag',
		    array(':ProjectID'=>$item->ProjectID,':Flag'=>'a'));
		}
		
		$commentNewest=array();
		foreach($newest as $item){
		$commentNewest[]=ProjectComment::model()->count(
		    'ProjectID=:ProjectID AND Flag=:Flag',
		    array(':ProjectID'=>$item->ProjectID,':Flag'=>'a'));
		}
		
		
		$this->render('index',array(
					'category'=>$category,
					'hotest'=>$hotest,
					'newest'=>$newest,
					'commentHotest'=>$commentHotest,
					'commentNewest'=>$commentNewest
					));
	
	}
	// Uncomment the following methods and override them if needed
	/*
	public function filters()
	{
		// return the filter configuration for this controller, e.g.:
		return array(
			'inlineFilterName',
			array(
				'class'=>'path.to.FilterClass',
				'propertyName'=>'propertyValue',
			),
		);
	}

	public function actions()
	{
		// return external action classes, e.g.:
		return array(
			'action1'=>'path.to.ActionClass',
			'action2'=>array(
				'class'=>'path.to.AnotherActionClass',
				'propertyName'=>'propertyValue',
			),
		);
	}
	*/
}
<?php

class AppHomeController extends Controller
{
	

        	public function actionIndex(){

		
		//categories
		$category=CategoryInfo::model()->findAll("Flag=:Flag",array(":Flag"=>"a"));
		
		//9 hotest
		$hotest=ProjectApp::model()->findAll(array(
   	 		'order' => 'AppDownloadTimes DESC',
    			'limit' => 9,
		));		
		//9 newest
		$newest=Project::model()->findAll(array(
   	 		'order' => 'ProjectCreatedTime DESC',
    			'limit' => 9,
		));

		$this->render('index',array(
					'category'=>$category,
					'hotest'=>$hotest,
					'newest'=>$newest));
	
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
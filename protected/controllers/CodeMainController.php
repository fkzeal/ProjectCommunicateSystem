<?php

class CodeMainController extends Controller {

    public $_id;
    
    public function init(){    
       		parent::init();    
		Yii::app()->clientScript->registerCssFile(Yii::app()->baseUrl.'/HomeFiles/css/Home.css');
//                Yii::app()->clientScript->registerCssFile(Yii::app()->baseUrl.'/css/CodeHome.css');
//                Yii::app()->clientScript->registerCssFile(Yii::app()->baseUrl.'/css/
//jquery-ui-1.8.17.custom.css');
//
//
		Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl.'/HomeFiles/js/Home.js');
//		Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl.'/js/jquery.ui.button.min.js');
//		Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl.'/js/jquery-1.7.1.min.js');
//		Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl.'/js/jquery-ui-1.8.17.custom.min.js');


	Yii::app()->clientScript->registerCoreScript('jquery');
	}


    public function actionIndex() {

             

		//st the categories on the left
		$category=CategoryInfo::model()->findAll("Flag=:Flag",array(":Flag"=>"c"));
		
		//find the 9 hotest projects` code
		$hotest=ProjectCode::model()->with("project")->findAll(array(
   	 		    'order' => 'CodeDownloadTimes DESC',
    			'limit' => 9,
    			//'offset' => 0,
		));		
		

		//find the 9 newest projects` code
		$newest=ProjectCode::model()->with("project")->findAll(array(
   	 		'order' => 'ProjectCreatedTime DESC',
    			'limit' => 9,         //不能只取9个，有的项目没有code 或者 app
    			//'offset' => 0,
		));

		$commentHotest=array();
		foreach($hotest as $item){
		$commentHotest[]=ProjectComment::model()->count(
		    'ProjectID=:ProjectID AND Flag=:Flag',
		    array(':ProjectID'=>$item->ProjectID,':Flag'=>'c'));
		}
		
		$commentNewest=array();
		foreach($newest as $item){
		$commentNewest[]=ProjectComment::model()->count(
		    'ProjectID=:ProjectID AND Flag=:Flag',
		    array(':ProjectID'=>$item->ProjectID,':Flag'=>'c'));
		}

		$this->render('index',array(
					'category'=>$category,
					'hotest'=>$hotest,
					'newest'=>$newest,
					'commentHotest'=>$commentHotest,
					'commentNewest'=>$commentNewest
					));
	

    }

    public function actionView() {

       //$cate=$_GET["cate"];
		$cate= Yii::app()->request->getParam('cate');
		$html="	<div class='box-tag'>
	    			<span>$cate</span>
			</div>";

		$category=CategoryInfo::model()->findAll('FirstLevel=:FirstLevel',array(':FirstLevel'=>$cate));
		
		if(!empty($category)){
			$cateid=$category[0];
			
			$projectid=$cateid->appCodeCategory;
			if(!empty($projectid)){
				foreach($projectid as $item){
		
				$pro=$item->project;
				$code=$pro->projectCodes;
				
				$html.="
					<div id='category-detail' class='msg-box'>;
						<ul class='category-block'>
							<li><img src='$pro[ProjectIconPath]' alt='code-img' /></li>
							<li class='category-item-name'>
								<span>$pro[ProjectName]</span>
							</li>
							<li>
								<p>$code[CodeDescription]</p>
							</li>
							<li class='category-item-grade'>
								<span>评分:$code[CodeScore]</span>
							</li>
							<li class='category-item-comments'>
								<span>评论数： </span>
							</li>
							<button class='btn'>下载</button>
						</ul>
					</div>
			      	";  	
				}
			}		
		}
		$html = iconv("","UTF-8",$html);
		echo $html;	
	}

    

    public function filters()
	{
		return array(
			'accessControl', // perform access control for CRUD operations
		);
                
	}
        
public function accessRules()
	{
		return array(
			array('allow',  // allow all users to perform 'index' and 'view' acti
                'expression'=> (Yii::app()->user->getState('authority')==1 ? null : 'false'), 
                            
			),
            array('deny',  // allow all users to perform 'index' and 'view' acti
				'users'=>array('*'),
                'message'=>'您不是开发者，权限不够无法浏览源码'
//                        'verbs'=>array('GET', 'POST')
			),
			
		);
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
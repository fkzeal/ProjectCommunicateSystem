<?php

class CodeMainController extends Controller {

    public $_id;
    
    public function init(){    
       		parent::init();    
//		Yii::app()->clientScript->registerCssFile(Yii::app()->baseUrl.'/css/global.css');
//                Yii::app()->clientScript->registerCssFile(Yii::app()->baseUrl.'/css/CodeHome.css');
//                Yii::app()->clientScript->registerCssFile(Yii::app()->baseUrl.'/css/
//jquery-ui-1.8.17.custom.css');
//
//
//		Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl.'/js/CodeHome.js');
//		Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl.'/js/jquery.ui.button.min.js');
//		Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl.'/js/jquery-1.7.1.min.js');
//		Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl.'/js/jquery-ui-1.8.17.custom.min.js');


	Yii::app()->clientScript->registerCoreScript('jquery');
	}


    public function actionIndex() {
//        $this->_id = $_GET['id'];
//        $cookie=Yii::app()->request->cookies['loginID'];
//        $this->_id = $cookie->value;
//           $this->redirect($this->createUrl('View'));
//        $name = User::model()->findByPk($this->_id)->NickName;
//        $username = User::model()->findByPk($this->_id)->UserName;
//        if (empty($name)) {
//            $name = $username;
//        }
//        
//        $categoryInfo = CategoryInfo::model()->findAllByAttributes(array(
//            'Flag'=>'c'
//        ));
//        
////     
//        
//        $criteria = new CDbCriteria; 
//        $criteria->order = 'CodeDownloadTimes DESC';
//        $criteria->limit = 9;
////        $criteria->with=array(
////'project'
////);
//
//        $hotCode = ProjectCode::model()->with('project')->findAll($criteria);
////        $hotCode = ProjectCode::model()->with(array( 'project'=>array(  'ProjectIconPath')))->findAll($criteria);
//        
////        foreach ($hotCode as $key => $value) {
////            $hotProject[] = $value->project;
//////            Project::model()->findByPk($hotCode[$key]->ProjectID);;
////        }
//        
//        $this->render('index'
//                , array('name' => $name,'categoryInfo'=>$categoryInfo,
//                    'hotCode'=>$hotCode,//'hotProject'=>$hotProject
//                    'id'=> $this->_id,
//                    )
//        );
             

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

		

		$this->render('index',array(
					'category'=>$category,
					'hotest'=>$hotest,
					'newest'=>$newest));
	

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
                            expression=> (Yii::app()->user->getState('authority')==1 ? null : 'false'), 
                            
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
<?php

class DetailListController extends Controller {

    public function init(){    
       		parent::init();    
		Yii::app()->clientScript->registerCssFile(Yii::app()->baseUrl."CategoryDetail/css/CategoryDetail.css");
//                Yii::app()->clientScript->registerCssFile(Yii::app()->baseUrl.'/css/CodeHome.css');

		Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl.'CategoryDetail/js/CategoryDetail.js');
//	Yii::app()->clientScript->registerCoreScript('jquery');
	}
    public function actionList() {
        $type = Yii::app()->request->getParam('type');
        $category = Yii::app()->request->getParam('category');
        $projectid = Yii::app()->request->getParam('projectid');
        $categoryInfo = CategoryInfo::model()->with('appCodeCategory')->findAll('FirstLevel=:FirstLevel And Flag=:f', 
                array(':FirstLevel' => $category,':f'=>$type));

        if (!empty($categoryInfo)) {
            $cate = $categoryInfo[0];

//            $projectid = $cateid->appCodeCategory;
//            if (!empty($projectid)) {
//                foreach ($projectid as $value) {
//
//                    $project = $value->project;
//                    switch ($type){
//                    case 'c':
//                        $item = $project->projectCodes;
//                        break;
//                    case 'a':
//                        $item = $project->projectApps;
//                        break;
//                    }
//                }
//            }
        }  else {
            $this->redirect(Yii::app()->homeUrl);
        }

        $this->render('list',array(
            'cate'=>$cate,'type'=>$type,'category'=>$category,'projectid'=>$projectid
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
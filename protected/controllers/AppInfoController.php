<?php

class AppInfoController extends Controller
{
	public function actionIndex()
	{
		$id = Yii::app()->user->getState('id');
        $projectid = $_GET['projectid'];
//           $this->redirect($this->createUrl('View'));
        $projectExist = Project::model()->findByPk($projectid);
        $previousProject = Yii::app()->user->getState('projectid');
        if (!isset ($projectExist)){
            
//            Yii::app()->errorHandler->error->message = '44444';
            throw new CHttpException(404,'此项目不存在');
//            if (isset ($previousProject)) {
//                $this->redirect(Yii::app()->createUrl('appinfo/index'),
//                    array('projectid'=>$previousProject));
//            }  else {
//                $this->redirect(Yii::app()->createUrl('apphome/index'));
//            }  
            
        }else {
            $appExist = ProjectApp::model()->findByAttributes(array('ProjectID'=>$projectid));
            if (isset ($appExist)) {
//                Yii::app()->user->setState('projectid',$projectid);
            }else {
                            throw new CHttpException(404,'此项目没有对应的应用程序可供下载');

//            if (isset ($previousProject)) {
//                $this->redirect(Yii::app()->createUrl('appinfo/index'),
//                    array('projectid'=>$previousProject));
//            }  else {
//                $this->redirect(Yii::app()->createUrl('apphome/index'));
//            }  
            }
        }
        $categoryInfo = CategoryInfo::model()->findAllByAttributes(array(
            'Flag' => 'a'
                ));

//        $criteria = new CDbCriteria;
//        $criteria->condition = 'ProjectID=:projectid,Flag=:flag';
//        $criteria->params = array(':projectid' => $projectid,':flag' => 'a');
        //find the comment table where the flag=c and eager find the relation user

        $project = Project::model()->with('projectApps', 'user')->findByPk($projectid);
        $categoryID = AppCodeCategory::model()->with('category')->findAllByAttributes(array(
            'ProjectID' => $projectid
                ));                        
        foreach ($categoryID as $value) {
            if ($value->category[Flag] == 'a') {
                $category = $value->category;
            }
        }
        //$category = CategoryInfo::model()->findByPk($category->CategoryID);
        //$categoryID[] = $category->category[SecondLevel];

        $comment = ProjectComment::model()->with('user')->findAllByAttributes(array(
            'ProjectID' => $projectid, 'Flag' => 'a'
                ));

        $count = ProjectComment::model()->count("ProjectID=:projectid AND Flag=:f", array(
            ':projectid' => $projectid, ':f' => 'a'));
        
//        $refered = ProjectReference::model()->findAllByAttributes(array(
//            'WhoRefer' => $projectid
//                ));
//                foreach ($refered as $value) {
//                    $reference[$value->BeRefered] = Project::model()->findByPk($value->BeRefered);
//                }

    $tagID = AppCodeTag::model()->with('tag')->findAllByAttributes(array(
            'ProjectID' => $projectid
                ));
        foreach ($tagID as $value) {
            if ($value->tag[Flag] == 'a') {
                $tag[] = $value->tag;
            }
        }

        $this->render('index', array(
             'categoryInfo' => $categoryInfo,'tag'=>$tag,
            'comment' => $comment, 'project' => $project, 'category' => $category,
            'count' => $count,'userid'=>$id,'projectid'=>$projectid
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
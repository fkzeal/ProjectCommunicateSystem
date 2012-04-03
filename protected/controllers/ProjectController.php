<?php

class ProjectController extends Controller {

    public function actionCreate() {
        $project = new Project;
        $app = new ProjectApp;
        $code = new ProjectCode;
        $appcategory = new AppCodeCategory();
        $codecategory = new AppCodeCategory();

        // respond ajax validation
        $this->performAjaxValidation($project, $app, $code);

        if (isset($_POST['Project'], $_POST['ProjectApp'], $_POST['ProjectCode'])) {
            // mass assignment
            $project->attributes = $_POST['Project'];
            $code->attributes = $_POST['ProjectCode'];
            $appcategory->attributes = $_POST['AppCodeCategory'];
            $codecategory->attributes = $_POST['AppCodeCategory'];
            
            // TODO for the rich text editor, shoud strip some harmful tags with php strip_tags
            // TODO fake user
            $project->UserID = Yii::app()->user->getState('id');
            $project->ProjectStatus = Project::UNPUBLISHED;

            $project->ProjectIcon = CUploadedFile::getInstance($project, 'ProjectIcon');
            $app->AppFile = CUploadedFile::getInstance($app, 'AppFile');
            $code->CodeFile = CUploadedFile::getInstance($code, 'CodeFile');

            $valid = $project->validate();
            $valid = $app->validate() && $valid;
            $valid = $code->validate() && $valid;

            if ($valid) {
                $project->save(false);

                $app->ProjectID = $project->ID;
                $app->save(false);

                $code->ProjectID = $project->ID;
                $code->save(false);
                
                $appcategory->ProjectID = $project->ID;
                $appcategory->insert();
                
                $codecategory->ProjectID = $project->ID;
                $codecategory->insert();

                $rootPath = Yii::app()->basePath . DIRECTORY_SEPARATOR . 'data' . DIRECTORY_SEPARATOR . $project->ID . DIRECTORY_SEPARATOR;
                $basePath = $rootPath;
                if (!is_dir($bashPath)) {
                    mkdir($basePath, 0777, true);
                }
                
                $iconpath = YiiBase::getPathOfAlias('webroot').DIRECTORY_SEPARATOR . 'Icon' .DIRECTORY_SEPARATOR. $project->ID.DIRECTORY_SEPARATOR;
                if (!is_dir($iconpath)) {
                    mkdir($iconpath, 0777, true);
                }
                
                $readPath = 'Icon' .DIRECTORY_SEPARATOR. $project->ID.DIRECTORY_SEPARATOR.$project->ProjectName . '.' . pathinfo($project->ProjectIcon, PATHINFO_EXTENSION);
                $projectIconPath = $iconpath . $project->ProjectName . '.' . pathinfo($project->ProjectIcon, PATHINFO_EXTENSION);
                $project->ProjectIcon->saveAs($projectIconPath);
                
                $project->ProjectIconPath = $readPath;
                $project->save(false);

                $basePath = $rootPath . 'app' . DIRECTORY_SEPARATOR;
                if (!is_dir($basePath)) {
                    mkdir($basePath, 0777, true);
                }
                $projectAppPath = $basePath . $project->ProjectName . '_app.' . pathinfo($app->AppFile, PATHINFO_EXTENSION);
                $app->AppFile->saveAs($projectAppPath);

                $basePath = $rootPath . 'code' . DIRECTORY_SEPARATOR;
                if (!is_dir($basePath)) {
                    mkdir($basePath, 0777, true);
                }
                $projectCodePath = $basePath . $project->ProjectName . '_code.' . pathinfo($code->CodeFile, PATHINFO_EXTENSION);
                $code->CodeFile->saveAs($projectCodePath);

                // TODO may redirect to another page
                echo $basePath;
                echo "Create project sucessfully";
            }
        }
        $this->render('index', array('project' => $project, 'app' => $app, 'code' => $code,
            'appcategory'=>$appcategory,'codecategory'=>$codecategory
            ));
    }

    protected function performAjaxValidation($project, $app, $code) {
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'create_project_form') {
            echo CActiveForm::validate($project);
            echo CActiveForm::validate($app);
            echo CActiveForm::validate($code);
        }
    }

    public function filters() {
        return array(
            'accessControl', // perform access control for CRUD operations
        );
    }

    public function accessRules() {
        return array(
            array('allow', // allow all users to perform 'index' and 'view' acti
                //'users'=>array('@'),
                expression => (Yii::app()->user->getState('authority') == 1 ? null : 'false'),
            ),
            array('deny', // allow all users to perform 'index' and 'view' acti
                'users' => array('*'),
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
<?php

class ProjectController extends Controller {

    public function actionCreate() {
        $project = new Project;
        $app = new ProjectApp;
        $code = new ProjectCode;

        // respond ajax validation
        $this->performAjaxValidation($project, $app, $code);

        if (isset($_POST['Project'], $_POST['ProjectApp'], $_POST['ProjectCode'])) {
            // massive assignment
            $project->attributes = $_POST['Project'];
            $app->attributes = $_POST['ProjectApp'];
            $code->attributes = $_POST['ProjectCode'];

            // TODO for the rich text editor, shoud strip some harmful tags with php strip_tags
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

                $rootPath = Yii::app()->basePath . DIRECTORY_SEPARATOR . 'data' . DIRECTORY_SEPARATOR . $project->ID . DIRECTORY_SEPARATOR;
                $basePath = $rootPath;
                if (!is_dir($bashPath)) {
                    mkdir($basePath, 0777, true);
                }
                
                $iconpath = YiiBase::getPathOfAlias('webroot').DIRECTORY_SEPARATOR . 'Icon' . DIRECTORY_SEPARATOR . $project->ID . DIRECTORY_SEPARATOR;
                if (!is_dir($iconpath)) {
                    mkdir($iconpath, 0777, true);
                }
                
                $readPath = 'Icon' .DIRECTORY_SEPARATOR. $project->ID . DIRECTORY_SEPARATOR.$project->ProjectName . '.' . pathinfo($project->ProjectIcon, PATHINFO_EXTENSION);
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

                $this->redirect(Yii::app()->createUrl('project/view'));
            }
        }

        $this->render('create', array('project' => $project, 'app' => $app, 'code' => $code));
    }

    protected function performAjaxValidation($project, $app, $code) {
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'create_project_form') {
            echo CActiveForm::validate($project);
            echo CActiveForm::validate($app);
            echo CActiveForm::validate($code);
            Yii::app()->end();
        }     
    }

    public function filters() {
        return array(
            'accessControl', // perform access control for CRUD operations
        );
    }

    public function accessRules() {
        return array(
            array('allow',
                  'actions'=>array('create'),
                  'users'=>array('@'),
            ),
            array('deny',
                  'actions'=>array('create'),
                  'users'=>array('*'),
            ),
        );
    }
}
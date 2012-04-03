
<?php
$this->breadcrumbs = array(
    'Project' => array('/project'),
    'Create',
);
?>

<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/assets/tinymce/jscripts/tiny_mce/tiny_mce.js"></script>

<script type="text/javascript">
    tinyMCE.init({
        height: "200px",
        width : "640px",
        //the flowing modes you can choose one   one for exactly on    one for all textarea
        mode : "textareas",
//        mode :"exact",
//        elements : "Project_ProjectDescription, ProjectCode_CodeDescription,ProjectCode_CodeFragment",
        theme : "advanced"
    });
</script>

<?php
$form = $this->beginWidget('CActiveForm', array(
    'id' => 'create_project_form',
    'enableAjaxValidation' => true,
    'enableClientValidation' => true,
    'focus' => array($project, 'ProjectName'),
    'htmlOptions' => array('enctype' => 'multipart/form-data'),
        ));
?>

<div id="project_form">
        <?php echo $form->errorSummary(array($project)); ?>
    <div class="row">
        <?php echo $form->labelEx($project, 'ProjectName'); ?>
<?php echo $form->textField($project, 'ProjectName'); ?>
        <?php echo $form->error($project, 'ProjectName'); ?>
    </div>
    <div class="row">
        <?php echo $form->labelEx($project, 'ProjectDescription'); ?>
<?php echo $form->textArea($project, 'ProjectDescription'); ?>
        <?php echo $form->error($project, 'ProjectDescription'); ?>
    </div>
    <div class="row">
        <?php echo $form->labelEx($project, 'ProjectIcon'); ?>
<?php echo $form->fileField($project, 'ProjectIcon'); ?>
<?php echo $form->error($project, 'ProjectIcon') ?>
    </div>
</div>

<div id="app_form">
        <?php echo $form->errorSummary(array($app)); ?>
    <div class="row">
        <?php echo $form->labelEx($app, 'AppFile'); ?>
<?php echo $form->fileField($app, 'AppFile'); ?>
<?php echo $form->error($app, 'AppFile') ?>
    </div>
</div>

        <div class="row">
		<?php echo '应用分类'; ?>
		<?php 
                $tag = CategoryInfo::model()->findAllByAttributes(array(
                    'Flag'=>'a'
                ));
                foreach ($tag as  $value) {
            $appList[$value->ID]=$value->FirstLevel;
        }
                
                echo $form->dropDownList($appcategory,'CategoryID',$appList
                        ); ?>
	</div>

<div id="code_form">
        <?php echo $form->errorSummary(array($code)); ?>
    <div class="row">
        <?php echo $form->labelEx($code, 'CodeDescription'); ?>
<?php echo $form->textArea($code, 'CodeDescription'); ?>
        <?php echo $form->error($code, 'CodeDescription') ?>
    </div>
    <div class="row">
        <?php echo $form->labelEx($code, 'CodeFragment'); ?>
<?php echo $form->textArea($code, 'CodeFragment'); ?>
        <?php echo $form->error($code, 'CodeFragment') ?>
    </div>
    <div class="row">
        <?php echo $form->labelEx($code, 'CodeFile'); ?>
<?php echo $form->fileField($code, 'CodeFile'); ?>
<?php echo $form->error($code, 'CodeFile') ?>
    </div>	
    
    <div class="row">
		<?php echo '代码分类'; ?>
		<?php 
                $tag = CategoryInfo::model()->findAllByAttributes(array(
                    'Flag'=>'c'
                ));
                foreach ($tag as  $value) {
            $codeList[$value->ID]=$value->FirstLevel;
        }
                
                echo $form->dropDownList($codecategory,'CategoryID',$codeList
                        ); ?>
	</div>
</div>

<div id="form_submit">
<?php echo CHtml::submitButton('Create'); ?>
</div>

<?php $this->endWidget(); ?>






<?php
Yii::app()->clientScript->registerCssFile(Yii::app()->baseurl . "/CreateFiles/css/create.css");
?>
<article class="row">
<div class="span12 offset2">
<?php
$form = $this->beginWidget('CActiveForm', array(
    'id' => 'create_project_form',
    'enableClientValidation' => true,
    'clientOptions'=>array(
        'validateOnSubmit'=>true,
    ),
    'htmlOptions' => array('enctype' => 'multipart/form-data'),
    ));
?>
<fieldset>
<legend>项目总信息</legend>
<div id="project_form">
    <?php echo $form->errorSummary(array($project), NULL, NULL, array('class'=>'alert alert-error')); ?>
    <div>
        <?php echo $form->labelEx($project, 'ProjectName'); ?>
        <?php echo $form->textField($project, 'ProjectName'); ?>
        <?php echo $form->error($project, 'ProjectName'); ?>
    </div>
    <div>
        <?php echo $form->labelEx($project, 'TeamName'); ?>
        <?php echo $form->textField($project, 'TeamName'); ?>
        <?php echo $form->error($project, 'TeamName'); ?>
    </div>
    <div>
        <?php echo $form->labelEx($project, 'ProjectSummary'); ?>
        <?php echo $form->textField($project, 'ProjectSummary'); ?>
        <?php echo $form->error($project, 'ProjectSummary'); ?>
    </div>
    <div>
        <?php echo $form->labelEx($project, 'ProjectDescription'); ?>
        <?php echo $form->textArea($project, 'ProjectDescription'); ?>
        <?php echo $form->error($project, 'ProjectDescription'); ?>
    </div>
    <div>
        <?php echo $form->labelEx($project, 'ProjectIcon'); ?>
        <?php echo $form->fileField($project, 'ProjectIcon'); ?>
        <?php echo $form->error($project, 'ProjectIcon') ?>
    </div>
</div>
</fieldset>
<fieldset>
<legend>应用信息</legend>
<div id="app_form">
    <?php echo $form->errorSummary(array($project), NULL, NULL, array('class'=>'alert alert-error')); ?>
    <div>
        <?php echo $form->labelEx($app, 'AppFile'); ?>
        <?php echo $form->fileField($app, 'AppFile'); ?>
        <?php echo $form->error($app, 'AppFile') ?>
    </div>
    <div>
        <?php echo $form->labelEx($app, 'CategoryID'); ?>
        <?php 
            $categories = CategoryInfo::model()->findAllByAttributes(array('Flag'=>'a'));
            foreach ($categories as  $category) {
                $appList[$category->ID] = $category->FirstLevel;
            }
            echo $form->dropDownList($app,'CategoryID',$appList); 
        ?>
    </div>
</div>
</fieldset>
<fieldset>
<legend>代码信息</legend>
<div id="code_form">
    <?php echo $form->errorSummary(array($project), NULL, NULL, array('class'=>'alert alert-error')); ?>
    <div>
        <?php echo $form->labelEx($code, 'CodeDescription'); ?>
        <?php echo $form->textArea($code, 'CodeDescription'); ?>
        <?php echo $form->error($code, 'CodeDescription') ?>
    </div>
    <div>
        <?php echo $form->labelEx($code, 'CodeFragment'); ?>
        <?php echo $form->textArea($code, 'CodeFragment'); ?>
        <?php echo $form->error($code, 'CodeFragment') ?>
    </div>
    <div>
        <?php echo $form->labelEx($code, 'CodeFile'); ?>
        <?php echo $form->fileField($code, 'CodeFile'); ?>
        <?php echo $form->error($code, 'CodeFile') ?>
    </div>
    <div>
        <?php echo $form->labelEx($code, 'CategoryID'); ?>
		<?php 
            $categories = CategoryInfo::model()->findAllByAttributes(array('Flag'=>'c'));
            foreach ($categories as  $category) {
                $codeList[$category->ID]=$category->FirstLevel;
            }
            echo $form->dropDownList($code,'CategoryID',$codeList); 
        ?>
	</div>
</div>
</fieldset>
<div id="form_submit">
<?php echo CHtml::submitButton('创建', array('id'=>'project_create_submit', 'class'=>"btn btn-primary")); ?>
</div>

<?php $this->endWidget(); ?>
</div>
</article>

<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/tinymce/jscripts/tiny_mce/tiny_mce.js"></script>
<script type="text/javascript">
    tinyMCE.init({
        // general options
        height: "200px",
        width: "100%",
        mode : "textareas",
        theme: "advanced",
        plugins: "table, insertdatetime,preview",

        // Theme options
        theme_advanced_buttons1 : "bold,italic,underline,strikethrough,|,justifyleft,justifycenter,justifyright,justifyfull,|,formatselect,fontselect,fontsizeselect",
        theme_advanced_buttons2 : "bullist,numlist,|,outdent,indent,blockquote,|,undo,redo,|,link,unlink,image,cleanup,code,|,insertdate,inserttime,preview,|,forecolor,backcolor",
        theme_advanced_buttons3 : "tablecontrols",
        theme_advanced_toolbar_location : "bottom",
        theme_advanced_toolbar_align : "center",
        theme_advanced_resizing : true,
        theme_advanced_statusbar_location : "bottom",
    });
</script>
<script type="text/javascript" src="<?php echo Yii::app()->baseUrl.'/CreateFiles/js/formToWizard.js' ?>"></script>
<script type="text/javascript">
    $('#create_project_form').formToWizard({submitButton: 'project_create_submit'});
</script>
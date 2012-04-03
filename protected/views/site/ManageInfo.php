<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd"> 
<html xmlns="http://www.w3.org/1999/xhtml"> 
<head> 
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" /> 
    </head>
<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'user-ManageInfo-form',
	'enableAjaxValidation'=>false,
)); ?>
<h1>更改您的昵称</h1>
	<p class="note">Fields with <span class="required">*</span> are required.</p>

		<?php 
        if( ($form->errorSummary($model) !== '')){
            echo"<p>表单填写错误</p>";
        }
          ?>
        



	<div class="row">
		<?php echo $form->labelEx($model,'NickName'); ?>
		<?php echo $form->textField($model,'NickName',array(
                    'value'=>$user->NickName
                )); ?>
		<?php echo $form->error($model,'NickName'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'Gender'); ?>
		<?php echo $form->radioButtonList($model,'Gender',array('M'=>'男','F'=>'女'),
                        array('separator'=>'&nbsp','labelOptions'=>array('class'=>'labelForRadio')
                            )) ?>
		<?php echo $form->error($model,'Gender'); ?>
	</div>



	<div class="row buttons">
		<?php echo CHtml::submitButton('Submit'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->
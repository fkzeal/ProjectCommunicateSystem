<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd"> 
<html xmlns="http://www.w3.org/1999/xhtml"> 
<head> 
    </head>
    <div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'user-UserForm-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php 
        if( ($form->errorSummary($model) !== '')){
            echo"<p>表单填写错误</p>";
        }
          ?>

<!--        <div class="row">-->
		<?php echo $form->labelEx($model,'UserName'); ?>
		<?php echo $form->textField($model,'UserName'); ?>
		<?php echo $form->error($model,'UserName'); ?>
<!--	</div>-->
        
<!--	<div class="row">-->
		<?php echo $form->labelEx($model,'UserPassword'); ?>
		<?php echo $form->passwordField($model,'UserPassword'); ?>
		<?php echo $form->error($model,'UserPassword'); ?>
<!--	</div>-->

	<div class="row">
		<?php echo $form->labelEx($model,'confirmPassword'); ?>
		<?php echo $form->passwordField($model,'confirmPassword'); ?>
		<?php echo $form->error($model,'confirmPassword'); ?>
	</div>
	

	<div class="row">
		<?php echo $form->labelEx($model,'NickName'); ?>
		<?php echo $form->textField($model,'NickName'); ?>
		<?php echo $form->error($model,'NickName'); ?>
	</div>

	

	<div class="row">
		<?php echo $form->labelEx($model,'Gender'); ?>
		<?php echo $form->radioButtonList($model,'Gender',array('M'=>'男','F'=>'女'),
                        array('separator'=>'&nbsp','labelOptions'=>array('class'=>'labelForRadio'))) ?>
		<?php echo $form->error($model,'Gender'); ?>
	</div>

<!--	<div class="row">
		<?php echo $form->labelEx($model,'Birthday'); ?>
		<?php echo $form->textField($model,'Birthday'); ?>
		<?php echo $form->error($model,'Birthday'); ?>
	</div>-->
        
        <?php if(CCaptcha::checkRequirements()): ?>
	<div class="row">
		<?php echo $form->labelEx($model,'verifyCode'); ?>
		<div>
		<?php $this->widget('CCaptcha'); ?>
		<?php echo $form->textField($model,'verifyCode'); ?>
		</div>
		<div class="hint">Please enter the letters as they are shown in the image above.
		</div>
		<?php echo $form->error($model,'verifyCode'); ?>
	</div>
	<?php endif; ?>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Submit'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->
<?php
$this->pageTitle=Yii::app()->name . ' - Contact Us';
$this->breadcrumbs=array(
	'Contact',
);
?>
<div class="row">
			<div class="span5 offset6">
                            <div class="well">
<legend>                     
联系我们
</legend>  
<?php if(Yii::app()->user->hasFlash('contact')): ?>

<div class="flash-success">
	<?php echo Yii::app()->user->getFlash('contact'); ?>
</div>

<?php else: ?>

<p>
<!--If you have business inquiries or other questions, please fill out the following form to contact us. Thank you.-->
如果您有任何使用上的疑问，或任何建设性的意见，或者使用上感到非常不爽，都可以填写下表，通过邮件告知我们，意见被采纳者将会获得奖励。谢谢
</p>



<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'contact-form',
	'enableClientValidation'=>true,
    'enableAjaxValidation'=>true,
	'clientOptions'=>array(
		'validateOnSubmit'=>true,
	),
//    'htmlOptions'=>array('class'=>'well',),
)); ?>

<!--	<p class="note">Fields with <span class="required">*</span> are required.</p>-->
<hr/>
	<?php 
        if( ($form->errorSummary($model) !== '')){
//            echo"<p style='color:#EE0000'>表单填写错误</p>";
        }
          ?>

<!--	<div class="row">-->
		<?php echo $form->labelEx($model,'name'); ?>
		<?php echo $form->textField($model,'name',array(
                    'class'=>'input-xlarge span4',  'required'=>'required'
                )); ?>
		<?php echo $form->error($model,'name',array(
                    'style'=>'color: #EE0000',  
                )); ?>
            <a style="color: #EE0000"></a>
<!--	</div>-->

<!--	<div class="row">-->
		<?php echo $form->labelEx($model,'email'); ?>
		<?php echo $form->textField($model,'email',array(
                    'class'=>'input-xlarge span4',  'required'=>'required'
                )); ?>
		<?php echo $form->error($model,'email',array(
                    'style'=>'color: #EE0000',  
                )); ?>
<!--	</div>-->

<!--	<div class="row">-->
		<?php echo $form->labelEx($model,'subject'); ?>
		<?php echo $form->textField($model,'subject',array('size'=>60,'maxlength'=>128),array(
                    'class'=>'input-xlarge span4',  'required'=>'required'
                )); ?>
		<?php echo $form->error($model,'subject',array(
                    'style'=>'color: #EE0000',  
                )); ?>
<!--	</div>-->

<!--	<div class="row">-->
		<?php echo $form->labelEx($model,'body'); ?>
		<?php echo $form->textArea($model,'body',array('rows'=>6, 'cols'=>50)
                        ,array(
                    'class'=>'input-xlarge span4',  'required'=>'required'
                )); ?>
		<?php echo $form->error($model,'body',array(
                    'style'=>'color: #EE0000',  
                )); ?>
<!--	</div>-->

	<?php if(CCaptcha::checkRequirements()): ?>
<!--	<div class="row">-->
		<?php echo $form->labelEx($model,'verifyCode'); ?>
		<div>
		<?php $this->widget('CCaptcha'); ?>
		<?php echo $form->textField($model,'verifyCode',array(
                    'class'=>'input-xlarge span4',  'required'=>'required'
                )); ?>
		</div>
		
		<?php echo $form->error($model,'verifyCode',array(
                    'style'=>'color: #EE0000',  
                )); ?>
<!--	</div>-->
	<?php endif; ?>
<br/>
<!--	<div class="row buttons">-->
		<?php echo CHtml::submitButton('发送邮件',array(
                    'class'=>'btn btn-primary'
                )); ?>
<!--	</div>-->

<?php $this->endWidget(); ?>

</div>
                        </div>
</div><!-- form -->

<?php endif; ?>
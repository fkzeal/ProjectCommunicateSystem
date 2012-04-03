<?php
$this->pageTitle=Yii::app()->name . ' - Error';
//$this->breadcrumbs=array(
//	'Error',
//);
?>

<h2>出错了。。。。。</h2>
<h3>Error:<?php echo $code; ?></h3> 

<div class="error">
<?php echo CHtml::encode($message); ?>
</div>
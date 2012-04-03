<?php
$this->breadcrumbs=array(
	'Others'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Other', 'url'=>array('index')),
	array('label'=>'Manage Other', 'url'=>array('admin')),
);
?>

<h1>Create Other</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>
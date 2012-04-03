<?php
$this->breadcrumbs=array(
	'Others'=>array('index'),
	$model->ID=>array('view','id'=>$model->ID),
	'Update',
);

$this->menu=array(
	array('label'=>'List Other', 'url'=>array('index')),
	array('label'=>'Create Other', 'url'=>array('create')),
	array('label'=>'View Other', 'url'=>array('view', 'id'=>$model->ID)),
	array('label'=>'Manage Other', 'url'=>array('admin')),
);
?>

<h1>Update Other <?php echo $model->ID; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>
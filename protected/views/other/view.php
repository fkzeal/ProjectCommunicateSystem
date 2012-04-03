<?php
$this->breadcrumbs=array(
	'Others'=>array('index'),
	$model->ID,
);

$this->menu=array(
	array('label'=>'List Other', 'url'=>array('index')),
	array('label'=>'Create Other', 'url'=>array('create')),
	array('label'=>'Update Other', 'url'=>array('update', 'id'=>$model->ID)),
	array('label'=>'Delete Other', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->ID),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Other', 'url'=>array('admin')),
);
?>

<h1>View Other #<?php echo $model->ID; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'ID',
		'age',
		'newcolumn',
		'date',
		'study',
	),
)); ?>

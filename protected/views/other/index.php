<?php
$this->breadcrumbs=array(
	'Others',
);

$this->menu=array(
	array('label'=>'Create Other', 'url'=>array('create')),
	array('label'=>'Manage Other', 'url'=>array('admin')),
);
?>

<h1>Others</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>

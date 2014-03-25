<?php
/* @var $this Tbgoods2Controller */
/* @var $model Tbgoods2 */

$this->breadcrumbs=array(
	'Tbgoods2s'=>array('index'),
	$model->name,
);

$this->menu=array(
	array('label'=>'List Tbgoods2', 'url'=>array('index')),
	array('label'=>'Create Tbgoods2', 'url'=>array('create')),
	array('label'=>'Update Tbgoods2', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Tbgoods2', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Tbgoods2', 'url'=>array('admin')),
);
?>

<h1>View Tbgoods2 #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'name',
		'code',
	),
)); ?>

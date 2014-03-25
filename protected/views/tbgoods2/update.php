<?php
/* @var $this Tbgoods2Controller */
/* @var $model Tbgoods2 */

$this->breadcrumbs=array(
	'Tbgoods2s'=>array('index'),
	$model->name=>array('view','id'=>$model->id),
	'Update',
);
/*
$this->menu=array(
	array('label'=>'List Tbgoods2', 'url'=>array('index')),
	array('label'=>'Create Tbgoods2', 'url'=>array('create')),
	array('label'=>'View Tbgoods2', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage Tbgoods2', 'url'=>array('admin')),
);
 */
?>

<h1>Update Tbgoods2 <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>
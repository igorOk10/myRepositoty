<?php
/* @var $this UserController */
/* @var $model User */

$this->menu=array(
	array('label'=>'Журнал пользователей', 'url'=>array('index')),
	array('label'=>'Добавить пользователя', 'url'=>array('create')),
	array('label'=>'Обновить информацию', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Удалить пользователся', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Вы уверены?')),
);
?>

<h1>View User #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'name',
		'id_usertype',
		'email',
		'login',
		'password',
	),
)); ?>

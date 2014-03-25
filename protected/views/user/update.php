<?php
/* @var $this UserController */
/* @var $model User */

$this->menu=array(
	array('label'=>'Журнал пользователей', 'url'=>array('index')),
	array('label'=>'Добавить пользователя', 'url'=>array('create')),
	);
?>

<h1>Обновление информации<?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>
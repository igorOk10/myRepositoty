<?php
/* @var $this Tbgoods2Controller */
/* @var $model Tbgoods2 */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'tbgoods2-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
            
		<?php echo $form->labelEx($model,'наименование'); ?>
		<?php echo $form->textField($model,'name',array('size'=>50,'maxlength'=>250)); ?>
		<?php echo $form->error($model,'name'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'код'); ?>
		<?php echo $form->textField($model,'code',array('size'=>30,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'code'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Сохранить'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->
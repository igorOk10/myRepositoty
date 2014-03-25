<div class="form">
    <?php
        $this->beginWidget('CActiveForm', array(
                    'id'=>'comin-form',
                    'enableAjaxValidation'=>false));
    ?>
    
    <?php echo CHtml::errorSummary($model); ?>

    <p>Обновления записи</p>

    <div class="row">
        <?php echo CHtml::activeLabel($model, 'id_goods'); ?>
        <?php   
            $listData = CHtml::listData(Tbgoods2::model()->findAll("id > 0"), 'id', 'name');
            echo CHtml::activeDropDownList($model, 'id_goods', $listData);
        ?>  
        <?php echo CHtml::error($model, 'id_goods'); ?>
    </div>

    <div class="row">
        <?php echo CHtml::activeLabel($model, 'contragent'); ?>
        <?php echo CHtml::activeTextField($model, 'contragent'); ?>
        <?php echo CHtml::error($model, 'contragent'); ?>
    </div>

    <div class="row">
        <?php echo CHtml::activeLabel($model, 'date_document'); ?>
        <?php echo CHtml::activeTextField($model, 'date_document'); ?>
        <?php echo CHtml::error($model, 'date_document'); ?>
    </div>

    <div class="row">
        <?php echo CHtml::activeLabel($model, 'qty_produkt'); ?>
        <?php echo CHtml::activeTextField($model, 'qty_produkt'); ?>
        <?php echo CHtml::error($model, 'qty_produkt'); ?>
    </div>

    <div class="row">
        <?php echo CHtml::activeLabel($model, 'price'); ?>
        <?php echo CHtml::activeTextField($model, 'price'); ?>
        <?php echo CHtml::error($model, 'price'); ?>
    </div>

    <div class="row">
        <?php echo CHtml::activeLabel($model, 'text_note'); ?>
        <?php echo CHtml::activeTextArea($model, 'text_note', array('rows'=>6, 'cols'=>50)); ?>
        <?php echo CHtml::error($model, 'text_note'); ?>
    </div>
    
    <div class="row buttons">
        <?php echo CHtml::submitButton($model->isNewRecord ? 'Создать' : 'Обновить'); ?>
    </div>

    <?php $this->endWidget(); ?>
</div>


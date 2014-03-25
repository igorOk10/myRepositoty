<?php
    $this->breadcrumbs = array(
        'Добавить приход' => array('create'),
        'Текущий созданный документ'
    );
?>

<p> Текущий добавленный документ </p>

<table class="table table-striped table-bordered table-hover dataTable no-footer">
    <tr>
        <th>Товар</th>
        <th>Название контрагента</th>
        <th>Дата создания документа</th>
        <th>Кол-во продукта</th>
        <th>Цена</th>
    </tr>
    <tr>
    <?php
        foreach ($table as $key=> $row) {
            echo "<td>".$row."</td>";
        }
    ?>
    </tr>        
</table>
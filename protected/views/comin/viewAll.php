<?php
    $this->breadcrumbs = array(
        'Список прихода товаров'
    );
?>

<center><h1>Список товаров</h1></center>

<br /><br />
<form method="POST" action="<?php echo Yii::app()->request->baseUrl; ?>/index.php/comin/delete">
    <input class="btn btn-commin collaps" id="idDelete" type="submit" name="send" value="Delete" />
	<?php
		if(isset($message)) {
			echo "<h4 style=\"color: red\">Для удаления выберите запись</h4>";
		} else {
			echo "<br /><br />";
		}
	?>
    
    <table class="table table-striped table-bordered table-hover dataTable no-footer">
        <tr>
            <th>№</th>
            <th>Товар</th>
            <th>Контрагент</th>
            <th>Дата документа</th>
            <th>Кол-во товара</th>
            <th>Цена</th>
            <th>Примечание</th>
            <th>Управления записями</th>
        </tr>
            <?php
                //if(!isset($_POST['send'])) {
                    //var_dump($modelTable); die();
                    foreach ($modelTable as $cominArray) {
                        echo "<tr>";
            ?>
            <td><input type="checkbox" name="deleteComin[]" value="<?php echo $cominArray->id ?>" /></td>
            <?php
                        echo "<td>".Tbgoods2::model()->findByPk($cominArray->id_goods)->name."</td>";
                        echo "<td>".$cominArray->contragent."</td>";
                        echo "<td>".$cominArray->date_document."</td>";
                        echo "<td>".$cominArray->qty_produkt."</td>";
                        echo "<td>".$cominArray->price."</td>";
                        echo "<td>";
                            if($cominArray->text_note == "")
                                    echo 'Не задано';
                            else
                                    echo $cominArray->text_note;
                        echo "</td>";
                        echo "<td>";
                        echo CHtml::link('Редактировать', array('comin/update', 'id' => $cominArray->id));
                        echo "</td>";
                        echo "</tr>";
                    }
                //}
            ?>
        <script>
            var inp = document.getElementsByTagName('input');
            var buttonDelete = document.getElementById('idDelete');
            var length = inp.length;

            for (var i = 0; i < length; i++) {
                if(inp.type == 'checkbox' && inp.checked == true)
                    buttonDelete.disabled = "enabled";
                else if(inp.type == 'checkbox' && inp.checked == false)
                    buttonDelete.disabled = "disabled";
            }
        </script>
    </table>
</form>

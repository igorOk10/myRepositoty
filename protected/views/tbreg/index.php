<?php
/* @var $this TbregController */

$this->breadcrumbs=array(
	'отчет по остаткам',
);
?>
<!--<h1><?php echo $this->id . '/' . $this->action->id; ?></h1>-->


<?php echo CHtml::beginForm();?>
<?php echo CHtml::submitButton('Сформировать');?>
<?php echo CHtml::endForm();?>
<br />

<?php 

?>
<table  class="table table-striped table-bordered table-hover dataTable no-footer" > 
<tr>
     <th>id</th>
    <th>наименование </th>
    <th>код</th>
    <th>остаток</th>
   </tr>
<?php 
foreach($table as $row) //вывод 
{
        echo "<tr>";
        foreach ($row as $col)
        {
            echo"<td>$col</td>";
        }

        echo"</tr>";

}	
		
?>

</table>

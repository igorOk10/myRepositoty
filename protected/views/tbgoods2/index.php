<?php
/* @var $this Tbgoods2Controller */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'справочники'=>array('index'),'товары',
    
);


?>


<?php
/*
$this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); 
*/
?>
<a href="<?php echo Yii::app()->request->baseUrl; ?>/index.php/tbgoods2/create"><button> Добавить </button></a>


<br/><br/>
<form method = "GET" action ="<?php echo Yii::app()->request->baseUrl; ?>/index.php/tbgoods2/update" >
    <input type ="submit" value ="Редактировать"></input>
<br/><br/>

<table  class="table table-striped table-bordered table-hover dataTable no-footer">
<tr>
    <th></th>
     <th>id</th>
    <th>наименование </th>
    <th>код</th>
   
   </tr>
<?php
foreach($table as $row) //вывод 
    {
            echo "<tr>";
            
            
           echo"<td>";
           ?>
           <input type="radio" name="id" value="<?php echo $row['id']?>"> 
           <?php
            echo"</td><td>".$row['id']."</td> <td>".$row['name']."</td><td>".$row['code']."</td>";
             
            echo"</tr>";

    }	
		
?>

</table>
</form>


<?php

class CominController extends Controller
{
	public $layout='//layouts/column2';

	public function filters()
	{
		return array(
			'accessControl',
		);
	}

	public function accessRules()
	{
		return array(
			array('allow',
				'actions'=>array('index','view'),
				'roles'=>array('*'),
			),
			array('allow',
				'actions'=>array('create','update'),
				'roles'=>array('@'),
			),
			array('allow',
				'actions'=>array('admin','delete'),
				'roles'=>array('admin'),
			),
			array('deny',
				'roles'=>array('*'),
			),
		);
	}

	public function actionView()
	{
            $this->render('viewAll', array('modelTable' => $this->loadModel()));
	}

	public function actionCreate()
	{
            $model = new Comin();
            
            if(isset($_POST['Comin']))
            {
                $model->attributes = $_POST['Comin'];
                $this->addReg($model->id_goods, $model->date_document, $model->qty_produkt);
                
                try {
                    if($model->save()) {
                        $table = $this->arrayCurrentComing($model->id);
                        $this->render('currentAdd', array('table' => $table));
                    }
                }
                catch(Exception $ex) {
                    $this->render('error', "Невозможно добавить данные"); 
                }
            }

            $this->render('create', array('model' => $model));
	}
        
        // ф-ция формирвоания массива на вывод текущей записи
        public function arrayCurrentComing($id)
        {
            $result = Comin::model()->findByPk($id);
            $arrayComin = array(
                'id_goods' => Tbgoods2::model()->findByPk($result->id_goods)->name, 
                'contragent' => $result->contragent, 
                'date_document' => $result->date_document, 
                'qty_produkt' => $result->qty_produkt, 
                'price' => $result->price
            );
            
            return $arrayComin;
        }
        
        // ф-ция записи данных в таблицу остатков регистра
        public function addReg($id_goods, $date_t, $qty)
        {
            $tbReg = new TbReg();
            
            $tbReg->id_goods = $id_goods;
            $tbReg->type_t = 0;
            $tbReg->date_t = $date_t;
            $tbReg->qty = $qty;

            $tbReg->save();
        }

	public function actionUpdate($id)
	{
		$model = Comin::model()->findByPk($id);
                $oldModel = clone $model;
                
		if(isset($_POST['Comin']))
		{                        
			$model->attributes = $_POST['Comin'];
                        $this->updateReg($oldModel, $model);
                        
			if($model->save()) {                            
                            $this->redirect(array('view', 'id' => $model->id));
                        }
		}

		$this->render('update', array('model' => $model));
	}
        
        public function updateReg($oldModel, $cominModel)
        {
            $criteria = new CDbCriteria();
            
            $criteria->condition = "id_goods = :id_goods and date_t = :date_t";
            $criteria->params = array(
                ":id_goods" => $oldModel->id_goods,
                ":date_t" => $oldModel->date_document
            );
            
            $regModel = TbReg::model()->find($criteria);
            //var_dump($regModel); die();
            if($regModel != null) {

                $regModel->id_goods = $cominModel->id_goods;
                $regModel->date_t = $cominModel->date_document;
                $regModel->qty = $cominModel->qty_produkt;
                
                $regModel->update();
            }
        }

	public function actionDelete()
	{
		if(isset($_POST['deleteComin'])) {
	            $arrayChoiceComin = array();
		        for($i=0; $i<count($_POST['deleteComin']); $i++) {
		            $arrayChoiceComin[] = $_POST['deleteComin'][$i];
		        }

		        if(count($arrayChoiceComin) == 1) {
		            $result = Comin::model()->findByPk($arrayChoiceComin[0]);

		            $this->updateRegQty($result);
		            $result->delete(); 
		        } else {
		            foreach ($arrayChoiceComin as $item) {
		                $result = Comin::model()->findByPk($item);

		                $this->updateRegQty($result);
		                $result->delete();   
		            }
		        }
		        
		        $this->render('viewAll', array('modelTable' => $this->loadModel()));
			} else {
				$this->render('viewAll', array('modelTable' => $this->loadModel(), 'message' => true));
			}
	}
        
        public function updateRegQty($cominModel)
        {
            $criteria = new CDbCriteria();
            
            $criteria->condition = "id_goods = :id_goods and date_t = :date_t";
            $criteria->params = array(
                ":id_goods" => $cominModel->id_goods,
                ":date_t" => $cominModel->date_document
            );
            
            $reg = TbReg::model()->find($criteria);
            if($reg->qty == 1)
                $reg->delete();
            else {
                $reg->qty -= $cominModel->qty_produkt;
                $reg->update();
            }
        }

	public function actionIndex()
	{
		$this->render('viewAll', array('modelTable' => $this->loadModel()));
	}

	public function actionAdmin()
	{
		$model=new Comin('search');
		$model->unsetAttributes();
                
		if(isset($_GET['Comin']))
			$model->attributes = $_GET['Comin'];

		$this->render('admin', array('model'=>$model));
	}

	public function loadModel()
	{
		$model = Comin::model()->findAll("id > 0");
		if($model === null)
			throw new CHttpException(404, 'The requested page does not exist.');
		return $model;
	}

	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='comin-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
?>

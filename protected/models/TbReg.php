<?php

/**
 * This is the model class for table "tb_reg".
 *
 * The followings are the available columns in table 'tb_reg':
 * @property integer $id
 * @property integer $id_goods
 * @property integer $type_t
 * @property string $date_t
 * @property integer $qty
 *
 * The followings are the available model relations:
 * @property TbGoods $idGoods
 */
class TbReg extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'tb_reg';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('id_goods, type_t, date_t, qty', 'required'),
			array('id_goods, type_t, qty', 'numerical', 'integerOnly'=>true),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, id_goods, type_t, date_t, qty', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
			'idGoods' => array(self::BELONGS_TO, 'TbGoods', 'id_goods'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'id_goods' => 'Id Goods',
			'type_t' => 'Type T',
			'date_t' => 'Date T',
			'qty' => 'Qty',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 *
	 * Typical usecase:
	 * - Initialize the model fields with values from filter form.
	 * - Execute this method to get CActiveDataProvider instance which will filter
	 * models according to data in model fields.
	 * - Pass data provider to CGridView, CListView or any similar widget.
	 *
	 * @return CActiveDataProvider the data provider that can return the models
	 * based on the search/filter conditions.
	 */
	public function search()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id);
		$criteria->compare('id_goods',$this->id_goods);
		$criteria->compare('type_t',$this->type_t);
		$criteria->compare('date_t',$this->date_t,true);
		$criteria->compare('qty',$this->qty);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return TbReg the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
	
	//мои методы
	
	//получение таблицы  остатков
	public function viewTable()
	{
		$sql = "SELECT tb_reg.id,name, code, type_t, qty
				FROM tb_goods, tb_reg
			    WHERE tb_goods.id=tb_reg.id_goods;";
		$connection = Yii::app()->db;
		$command = $connection->createCommand($sql);
		$tmp_res = $command->queryAll();
		
		//1 вариант :  с групировкой по названию товара
		$res = array();
		foreach($tmp_res as &$x)
		{
			if($x['type_t']==1) //если тип операции продажа- меняем знак количества на -
			$x['qty'] *= -1;
			if (!array_key_exists($x['name'], $res) ) 
			{
					$res[$x['name']] = array('id'=>$x['id'],'name'=>$x['name'],'code'=>$x['code'], 'qty'=>$x['qty'],);
			}
			else
			{
				$res[$x['name']] ['qty'] += $x['qty'];
			}
		}
		return $res;
	}
	
	
}


<?php

class Comin extends CActiveRecord
{
	public function tableName()
	{
            return 'tb_in';
	}

	public function rules()
	{
            return array(
                array('id_goods, contragent, date_document, qty_produkt, price', 'required'),
				array('date_document', 'date', 'format' => 'yyyy-MM-dd hh:mm:ss'),
				array('qty_produkt, price', 'numerical', 'min' => 1, 'max' => 900000, 'integerOnly' => true),
                array('contragent', 'length', 'min' => 5, 'max' => 50),
                array('id, id_goods, contragent, date_document, qty_produkt, price, text_note', 'safe', 'on'=>'search'),
            );
	}

	public function relations()
	{
            return array(
                'idGoods' => array(self::BELONGS_TO, 'TbGoods', 'id_goods'));
	}

	public function attributeLabels()
	{
            return array(
                'id' => 'ID',
                'id_goods' => 'Идентификатор продукта',
                'contragent' => 'Имя контрагента',
                'date_document' => 'Дата создания документа',
                'qty_produkt' => 'Кол-во продукта',
                'price' => 'Цена',
                'text_note' => 'Текстовое примечание');
	}

	public function search()
	{
            $criteria = new CDbCriteria();

            $criteria->compare('id', $this->id);
            $criteria->compare('id_goods', $this->id_goods);
            $criteria->compare('contragent', $this->contragent, true);
            $criteria->compare('date_document', $this->date_document, true);
            $criteria->compare('qty_produkt', $this->qty_produkt);
            $criteria->compare('price', $this->price);
            $criteria->compare('text_note', $this->text_note, true);

            return new CActiveDataProvider($this, array(
                    'criteria' => $criteria));
	}

	public static function model($className=__CLASS__)
	{
            return parent::model($className);
	}
}
?>

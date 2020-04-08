<?php

/**
 * This is the model class for table "stock".
 *
 * The followings are the available columns in table 'stock':
 * @property string $id
 * @property string $product_id
 * @property string $price
 * @property integer $imputnumber
 * @property integer $total
 * @property string $date_input
 * @property string $date_expire
 * @property string $product_name
 */
class Stock extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'stock';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('imputnumber, total', 'numerical', 'integerOnly'=>true),
			array('product_id', 'length', 'max'=>20),
			array('price', 'length', 'max'=>10),
			array('product_name', 'length', 'max'=>255),
			array('date_input, date_expire', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, product_id, price, imputnumber, total, date_input, date_expire, product_name', 'safe', 'on'=>'search'),
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
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'product_id' => 'รหัสสินค้า',
			'price' => 'ราคา',
			'imputnumber' => 'จำนวนนำเข้า',
			'total' => 'จำนวนคงเหลือ',
			'date_input' => 'วันที่นำเข้า',
			'date_expire' => 'วันที่หมดอายุ',
			'product_name' => 'ชื่อสินค้า',
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

		$criteria->compare('id',$this->id,true);
		$criteria->compare('product_id',$this->product_id,true);
		$criteria->compare('price',$this->price,true);
		$criteria->compare('imputnumber',$this->imputnumber);
		$criteria->compare('total',$this->total);
		$criteria->compare('date_input',$this->date_input,true);
		$criteria->compare('date_expire',$this->date_expire,true);
		$criteria->compare('product_name',$this->product_name,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Stock the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}

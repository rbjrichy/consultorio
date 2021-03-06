<?php

/**
 * This is the model class for table "tratamiento".
 *
 * The followings are the available columns in table 'tratamiento':
 * @property integer $id
 * @property string $tratamiento
 * @property string $detalle
 * @property integer $idpaciente
 */
class Tratamiento extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'tratamiento';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('tratamiento, detalle, idpaciente', 'required'),
			array('idpaciente', 'numerical', 'integerOnly'=>true),
			array('tratamiento', 'length', 'max'=>100),
			array('detalle', 'length', 'max'=>500),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, tratamiento, detalle, idpaciente, numpieza, costo', 'safe', 'on'=>'search'),
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
			'numeroconsultorio'=> array(self::BELONGS_TO,'Numeroconsultorio','idnumeroconsultorio'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'tratamiento' => 'Tratamiento',
			'detalle' => 'Detalle',
			'idpaciente' => 'Idpaciente',
			'numpieza' => 'Pieza',
			'costo' => 'Costo',
			'numeroconsultorio.doctorasignado' => 'Doctor',
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
		$criteria->compare('tratamiento',$this->tratamiento,true);
		$criteria->compare('detalle',$this->detalle,true);
		$criteria->compare('idpaciente',$this->idpaciente);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Tratamiento the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}

<?php

/**
 * This is the model class for table "anamnesis".
 *
 * The followings are the available columns in table 'anamnesis':
 * @property integer $id
 * @property string $motivoconsulta
 * @property integer $tratamientomedico
 * @property string $nombretratamientomedico
 * @property string $medicamentotratamientomedico
 * @property string $alergias
 * @property integer $diabetes
 * @property integer $hipertension
 * @property integer $cardiaco
 * @property integer $epilepsia
 * @property integer $embarazada
 * @property integer $gastritis
 * @property string $otros
 * @property integer $idpaciente
 */
class Anamnesis extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'anamnesis';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('motivoconsulta, tratamientomedico, nombretratamientomedico, medicamentotratamientomedico, alergias, diabetes, hipertension, cardiaco, epilepsia, embarazada, gastritis, otros, idpaciente', 'required'),
			array('tratamientomedico, diabetes, hipertension, cardiaco, epilepsia, embarazada, gastritis, idpaciente', 'numerical', 'integerOnly'=>true),
			array('motivoconsulta, otros', 'length', 'max'=>500),
			array('nombretratamientomedico, medicamentotratamientomedico, alergias', 'length', 'max'=>200),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, motivoconsulta, tratamientomedico, nombretratamientomedico, medicamentotratamientomedico, alergias, diabetes, hipertension, cardiaco, epilepsia, embarazada, gastritis, otros, idpaciente', 'safe', 'on'=>'search'),
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
			'motivoconsulta' => 'Motivo Consulta',
			'tratamientomedico' => 'Tratamiento Medico',
			'nombretratamientomedico' => 'Nombre Tratamiento Medico',
			'medicamentotratamientomedico' => 'Medicamento Tratamiento Medico',
			'alergias' => 'Alergias',
			'diabetes' => 'Diabetes',
			'hipertension' => 'Hipertension',
			'cardiaco' => 'Cardiaco',
			'epilepsia' => 'Epilepsia',
			'embarazada' => 'Embarazada',
			'gastritis' => 'Gastritis',
			'otros' => 'Otros',
			'idpaciente' => 'Idpaciente',
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
		$criteria->compare('motivoconsulta',$this->motivoconsulta,true);
		$criteria->compare('tratamientomedico',$this->tratamientomedico);
		$criteria->compare('nombretratamientomedico',$this->nombretratamientomedico,true);
		$criteria->compare('medicamentotratamientomedico',$this->medicamentotratamientomedico,true);
		$criteria->compare('alergias',$this->alergias,true);
		$criteria->compare('diabetes',$this->diabetes);
		$criteria->compare('hipertension',$this->hipertension);
		$criteria->compare('cardiaco',$this->cardiaco);
		$criteria->compare('epilepsia',$this->epilepsia);
		$criteria->compare('embarazada',$this->embarazada);
		$criteria->compare('gastritis',$this->gastritis);
		$criteria->compare('otros',$this->otros,true);
		$criteria->compare('idpaciente',$this->idpaciente);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Anamnesis the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}

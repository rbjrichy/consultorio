<?php

/**
 * This is the model class for table "pago".
 *
 * The followings are the available columns in table 'pago':
 * @property integer $id
 * @property string $fechahoraregistro
 * @property integer $numeropieza
 * @property integer $costo
 * @property integer $acuenta
 * @property integer $saldo
 * @property integer $idpaciente
  * @property integer $descripcion
  * @property integer $nombres
 */
class Pago extends CActiveRecord
{

	public $nombres;
	public $descripcion;
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'pago';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('fechahoraregistro, numeropieza, costo, acuenta, idpaciente', 'required'),
			array('costo, acuenta, saldo, idpaciente, idnumeroconsultorio', 'numerical', 'integerOnly'=>true),
			array('numeropieza', 'numerical', 'min'=>1, 'max'=>32),
			array('costo,acuenta', 'numerical', 'min'=>50, 'max'=>7000),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id,fechahoraregistro, nombres, numeropieza, costo, acuenta, saldo, idpaciente, descripcion, idnumeroconsultorio', 'safe', 'on'=>'search'),
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
			'paciente'=> array(self::BELONGS_TO,'Paciente','idpaciente'),
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
			'fechahoraregistro' => 'Fecha Pago',
			'numeropieza' => 'Nro. Pieza',
			'costo' => 'Costo',
			'acuenta' => 'A Cuenta',
			'saldo' => 'Saldo',		
			
			'numeroconsultorio.descripcion' => 'Consultorio',

			'paciente.usuario.nombres'=>'Nombres',
			

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
				
       // $criteria->join = 'JOIN paciente gi ON gi.id = t.idpaciente';
        $criteria->join = 'JOIN numeroconsultorio nu ON nu.id = t.idnumeroconsultorio';
        $criteria->addSearchCondition('descripcion','%'.$this->descripcion.'%',false, 'AND','LIKE');

      	//$criteria->addSearchCondition('nombrecompleto','%'.$this->nombrecompleto.'%',false, 'AND','LIKE');
        $criteria->compare('idpaciente',$this->idpaciente);

		$criteria->compare('fechahoraregistro',$this->fechahoraregistro,true);
		$criteria->compare('numeropieza',$this->numeropieza);
		$criteria->compare('costo',$this->costo);
		$criteria->compare('acuenta',$this->acuenta);
		$criteria->compare('saldo',$this->saldo);

		

		//$criteria->compare('numeroconsultorio.descripcion',$this->descripcion);
		//$criteria->compare('descripcion',$this->descripcion);

		$criteria->order = 'id desc';

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Pago the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}

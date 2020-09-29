<?php

/**
 * This is the model class for table "antecedentesdentales".
 *
 * The followings are the available columns in table 'antecedentesdentales':
 * @property integer $id
 * @property integer $numerocepilladas
 * @property integer $hilodental
 * @property integer $enjuaguebucal
 * @property integer $fuma
 * @property integer $numerofumadas
 * @property integer $tienedolor
 * @property integer $idtipomotivodolor
 * @property string $piezasdentales
 * @property integer $idpaciente
 */
class Antecedentesdentales extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'antecedentesdentales';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('numerocepilladas, hilodental, enjuaguebucal, fuma, numerofumadas, tienedolor, idtipomotivodolor, piezasdentales, idpaciente', 'required'),
			array('numerocepilladas, hilodental, enjuaguebucal, fuma, numerofumadas, tienedolor, idtipomotivodolor, idpaciente', 'numerical', 'integerOnly'=>true),
			array('piezasdentales', 'length', 'max'=>200),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, numerocepilladas, hilodental, enjuaguebucal, fuma, numerofumadas, tienedolor, idtipomotivodolor, piezasdentales, idpaciente', 'safe', 'on'=>'search'),
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

			'tipomotivodolor'=>array(self::BELONGS_TO,'Tipomotivodolor', 'idtipomotivodolor'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'numerocepilladas' => 'Nro. Cepilladas',
			'hilodental' => 'Hilo Dental',
			'enjuaguebucal' => 'Enjuague Bucal',
			'fuma' => 'Fuma',
			'numerofumadas' => 'Nro. Fumadas',
			'tienedolor' => 'Tiene Dolor',
			'idtipomotivodolor' => 'Tipo Motivo Dolor',
			'piezasdentales' => 'Piezas Dentales',
			'idpaciente' => 'Idpaciente',

			'tipomotivodolor.descripcion' => 'Motivo Dolor',			
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
		$criteria->compare('numerocepilladas',$this->numerocepilladas);
		$criteria->compare('hilodental',$this->hilodental);
		$criteria->compare('enjuaguebucal',$this->enjuaguebucal);
		$criteria->compare('fuma',$this->fuma);
		$criteria->compare('numerofumadas',$this->numerofumadas);
		$criteria->compare('tienedolor',$this->tienedolor);
		$criteria->compare('idtipomotivodolor',$this->idtipomotivodolor);
		$criteria->compare('piezasdentales',$this->piezasdentales,true);
		$criteria->compare('idpaciente',$this->idpaciente);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Antecedentesdentales the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}

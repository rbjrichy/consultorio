<?php

/**
 * This is the model class for table "estudios_externos".
 *
 * The followings are the available columns in table 'estudios_externos':
 * @property integer $id
 * @property string $nombre
 * @property string $descripcion
 * @property string $create_at
 * @property integer $paciente_id
 *
 * The followings are the available model relations:
 * @property Paciente $paciente
 */
class EstudiosExternos extends CActiveRecord
{
	public $nombre_archivo;
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'estudios_externos';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('nombre', 'required'),
			array('paciente_id', 'numerical', 'integerOnly'=>true),
			array('nombre', 'length', 'max'=>200),
			array('descripcion', 'length', 'max'=>500),
			array('create_at', 'safe'),
			array('nombre_archivo', 
				  'file', 
				  'types'=>'jpg,jpeg,png', 
				  'wrongType' => 'Formatos permitidos jpg, jpeg y png',
				  'maxSize' => 1024 * 1024 * 1,
				  'tooLarge' => 'El tamaño maximo es de 1MB',
				  'allowEmpty' => true,
				  'safe'=>false
				),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, nombre, descripcion, create_at, paciente_id', 'safe', 'on'=>'search'),
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
			'paciente' => array(self::BELONGS_TO, 'Paciente', 'paciente_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'nombre' => 'Nombre',
			'descripcion' => 'Descripción',
			'create_at' => 'Fecha Creación',
			'paciente_id' => 'Paciente',
			'nombre_archivo' => 'Foto Documento',
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
		$criteria->compare('nombre',$this->nombre,true);
		$criteria->compare('descripcion',$this->descripcion,true);
		$criteria->compare('create_at',$this->create_at,true);
		$criteria->compare('paciente_id',$this->paciente_id);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return EstudiosExternos the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}

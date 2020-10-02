<?php

/**
 * This is the model class for table "usuario".
 *
 * The followings are the available columns in table 'usuario':
 * @property integer $id
 * @property string $nombres
 * @property string $apellidopaterno
 * @property string $apellidomaterno
 * @property string $nombreusuario
 * @property string $clave
 * @property string $ci
 * @property string $sexo
 * @property integer $idciudad
 * @property string $numerotelefono
 * @property string $numerocelular
 * @property string $direccion
 * @property string $fecharegistro
 * @property integer $idtipousuario
 * @property integer $idpaciente
 */
class Usuario extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function beforeSave()
	{
		return parent::beforeSave();
	}


	public function validatePassword($password)
	{
		if (md5($password) == $this->clave)
		{
			Yii::app()->session['idusuario']=$this->id;
			Yii::app()->session['nombres']=$this->nombres;
		 	Yii::app()->session['apellidopaterno']=$this->apellidopaterno;
			Yii::app()->session['apellidomaterno']=$this->apellidomaterno;
			Yii::app()->session['nombreusuario']=$this->nombreusuario;
			Yii::app()->session['numerocelular']=$this->numerocelular;
			Yii::app()->session['email']=$this->email;
			Yii::app()->session['idciudad']=$this->idciudad;
			Yii::app()->session['idsexo']=$this->idsexo;
			Yii::app()->session['idtipousuario']=$this->idtipousuario;
			// Yii::app()->session['idpaciente']=$this->idpaciente;
		}
		return md5($password)===$this->clave;
	}
	public function hashPassword($password)
	{
		return crypt($password,$this->generateSalt());
	}

	public function tableName()
	{
		return 'usuario';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('nombres, apellidopaterno, nombreusuario, clave, ci, idsexo,idocupacion, idciudad, numerocelular,
				email, direccion, fecharegistro, idtipousuario', 'required'),
			array('idciudad, idtipousuario, idsexo,idocupacion, idpaciente', 'numerical', 'integerOnly'=>true),
			array('nombres', 'length', 'max'=>100),
			array('apellidopaterno, apellidomaterno, nombreusuario, clave, email, direccion', 'length', 'max'=>50),
			array('ci, numerotelefono, numerocelular', 'length', 'max'=>10),
			array('nombreusuario, email', 'unique'),

			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, nombres, apellidopaterno, apellidomaterno, nombreusuario, clave, ci, idsexo,idocupacion, 
				idciudad, numerotelefono, numerocelular,email, direccion, fecharegistro, idtipousuario,idpaciente', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array('sexo'=> array(self::BELONGS_TO,'Sexo','idsexo'),
					'ocupacion'=> array(self::BELONGS_TO,'Ocupacion','idocupacion'),
	    			'ciudad'=> array(self::BELONGS_TO,'Ciudad','idciudad'),
	    			'tipousuario'=> array(self::BELONGS_TO,'Tipousuario','idtipousuario'),
	    			//'paciente'=> array(self::BELONGS_TO,'Paciente','idpaciente'),
	    			);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'nombres' => 'Nombres',
			'apellidopaterno' => 'Primer Apellido',
			'apellidomaterno' => 'Segundo Apellido',
			'nombreusuario' => 'Usuario',
			'clave' => 'Contraseña',
			'ci' => 'C.I.',
			'idsexo' => 'Sexo',
			'idocupacion' =>'Ocupacion',
			'idciudad' => 'Ciudad',
			'numerotelefono' => 'Telefono',
			'numerocelular' => 'Celular',
			'email'=>'Email',
			'direccion' => 'Direccion',
			'fecharegistro' => 'Fecha Registro',
			'idtipousuario' => 'Tipo usuario',
			'idpaciente' => 'Paciente',
			'nombrecompletoordenapellido' => 'Nombre completo',			
					
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
		$criteria->compare('nombres',$this->nombres,true);
		$criteria->compare('apellidopaterno',$this->apellidopaterno,true);
		$criteria->compare('apellidomaterno',$this->apellidomaterno,true);
		$criteria->compare('nombreusuario',$this->nombreusuario,true);
		$criteria->compare('clave',$this->clave,true);
		$criteria->compare('ci',$this->ci,true);
		$criteria->compare('idsexo',$this->idsexo,true);
		$criteria->compare('idocupacion',$this->idsexo,true);
		$criteria->compare('idciudad',$this->idciudad,true);
		$criteria->compare('email',$this->email,true);
		$criteria->compare('numerotelefono',$this->numerotelefono,true);
		$criteria->compare('numerocelular',$this->numerocelular,true);
		$criteria->compare('direccion',$this->direccion,true);
		$criteria->compare('fecharegistro',$this->fecharegistro,true);
		$criteria->compare('idtipousuario',$this->idtipousuario);
		$criteria->compare('idpaciente',$this->idpaciente);

		

		$criteria->order = 'id desc';		

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Usuario the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}


	public function getNombrecompleto()
	{
		return $this->nombres.' '.$this->apellidopaterno.' '.$this->apellidomaterno;
	}

	public function getNombrecompletoOrdenApellido()
	{
		return $this->apellidopaterno.' '.$this->apellidomaterno.' '.$this->nombres;
	}

	public function getNombrecompletoDe()
	{
		return $this->apellidopaterno.' '.$this->apellidomaterno.' '.$this->nombres;
	}

	public function getNombrecompletoPara()
	{
		return $this->apellidopaterno.' '.$this->apellidomaterno.' '.$this->nombres;
	}

	
}

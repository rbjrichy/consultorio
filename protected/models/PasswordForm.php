<?php
class PasswordForm extends CFormModel
{
	/**
	 * @return string the associated database table name
	 */

	public $old_password;
	public $new_password;
	public $repeat_password;
	
	public function rules()
	{
		return array(
			array('old_password, new_password, repeat_password', 'required', 'on' => 'changePwd'),
			array('old_password', 'findPasswords', 'on' => 'changePwd'),
			array('repeat_password', 'compare', 'compareAttribute'=>'new_password', 'on'=>'changePwd'),
		);
	}


	// public function attributeLabels()
	// {
	// 	return array(
	// 		'id' => 'ID',	
	// 	);
	// }

	//matching the old password with your existing password.
	public function findPasswords($attribute, $params)
	{
		$user = Usuario::model()->findByPk(Yii::app()->user->id);
		if ($user->clave != md5($this->old_password))
			$this->addError($attribute, 'Old password es Incorrecto.');
	}
	
}

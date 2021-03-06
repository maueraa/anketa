<?php

/**
 * UserIdentity represents the data needed to identity a user.
 * It contains the authentication method that checks if the provided
 * data can identity the user.
 */
class UserIdentity extends CUserIdentity
{
	/**
	 * Authenticates a user.
	 * The example implementation makes sure if the username and password
	 * are both 'demo'.
	 * In practical applications, this should be changed to authenticate
	 * against some persistent user identity storage (e.g. database).
	 * @return boolean whether authentication succeeds.
	 */
	//private  $_id;
	public function authenticate()
	{
		/**/
		$users=array(
			// username => password
			'admin'=>'maueraa2302',
            'ilmiyor'=>'P@$$w0rd'
		);
		/**
		$record=User::model()->findByAttributes(array('username'=>$this->username));
		if($record===null)
		/**/
		if(!isset($users[$this->username]))
		/**/
			$this->errorCode=self::ERROR_USERNAME_INVALID;
		/**/
		elseif($users[$this->username]!==$this->password)
		 /**
		elseif($record->password!==md5($this->password))
		/**/
			$this->errorCode=self::ERROR_PASSWORD_INVALID;
		else
		{
		/**
			$this->_id=$record->id;
			$this->setState('username', $record->username);
		/**/
			$this->errorCode=self::ERROR_NONE;
		}
		return !$this->errorCode;
	}
/**
	public function getId()
	{
		return $this->_id;
	}
/**/
}
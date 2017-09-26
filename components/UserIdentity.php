<?php

	class UserIdentity extends CUserIdentity {
		private $_id;
		public $email;
		public $auth_key;


		public function __construct($email, $authKey) {
			parent::__construct(false, false);

			$this->email = $email;
			$this->auth_key = $authKey;
		}

		public function authenticate() {
			$record = User::model()->findByAttributes(array('email' => $this->email));

			if ($record === null)
				$this->errorCode = self::ERROR_USERNAME_INVALID;
			else if (floatval($this->auth_key) != floatval($record->auth_key)) {

				echo "$this->auth_key != $record->auth_key"; die;

				$this->errorCode = self::ERROR_PASSWORD_INVALID;
				$this->errorMessage = "Неверный ключ авторизации или email";
			} else {
				$this->_id = $record->id;
				$this->errorCode = self::ERROR_NONE;
			}

			return !$this->errorCode;
		}

		public function getId() {
			return $this->_id;
		}
	}
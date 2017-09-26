<?php

	class SiteController extends CController {

		public function actionIndex() {
			$user = new User;

			if (!empty($_POST['User'])) {

				$user->attributes = $_POST['User'];

				if ($user->validate()) {

					$user->sendAuthToken();

					Yii::app()->user->setFlash('success', $user->authMessage);
				}
			}

			$this->render('index', ['model' => $user]);
		}

		public function actionLogin() {
			$this->render('login');
		}

		public function actionLogout() {
			Yii::app()->user->logout();
			$this->redirect('/site/index');
		}

		public function actionAuth($uid = false, $email) {

			$user = User::model()->findByAttributes([
				'email' => $email,
			]);

			if(empty($user)) {
				$user = new User;
				$user->email = $email;
				$user->auth_key = $user->generateKey();
				$user->save();

				if($user->login()) {
					$this->redirect('/site/index');
				};
			}

			$user->auth_key = $uid;

			if($user->validate()) {
				if($user->login()) {
					$this->redirect('/site/index');
				};

				echo (CJSON::encode($user->getErrors()));
			};
		}

		public function actionError() {
			if ($error = Yii::app()->errorHandler->error) {
				echo CJSON::encode([
					'code'    => $error['code'],
					'message' => $error['message']
				]);
			}
		}
	}
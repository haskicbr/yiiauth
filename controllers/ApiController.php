<?php
	class ApiController extends CController {


		public function actionGetDecreaseSum() {
			$authKey = Yii::app()->request->getQuery('key');

			$user = User::findByAuthKey($authKey);

			if(empty($user)) throw new CHttpException('400');

			echo CJSON::encode([
				'email' => $user->email,
				'balance' => $user->balance
			]);
		}

		public function actionPostDecreaseSum() {
			$authKey = Yii::app()->request->getQuery('key');
			$sum = Yii::app()->request->getQuery('sum');

			if(empty($authKey || $sum)) throw new CHttpException('400');

			$user = User::findByAuthKey($authKey);

			if(!empty($user)) {
				$user->balance -= $sum;
				if($user->save()) {

					echo CJSON::encode([
						'email' => $user->email,
						'balance' => $user->balance
					]);

					Yii::app()->end();
				}

				throw new CHttpException('400');
			}
		}
	}
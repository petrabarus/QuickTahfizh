<?php

/**
 * ErrorController shows error page for administration module.
 * 
 * This controller will handle the error thrown and display the error view.
 * 
 * @author Petra Barus <petra.barus@gmail.com>
 * @package administration.controllers
 */
class ErrorController extends \CAdministrationController
{
	public $layout = '//layouts/error';

	/**
	 * Error page display action.
	 * 
	 * This page will display the error happens in the administration module.
	 */
	public function actionIndex()
	{
		$error = Yii::app()->errorHandler->error;
		$errorMessages = array(
			404 => array(
				'title' => Yii::t('messages', 'Not Found'),
				'message' => Yii::t('messages', 'We can not find the page you are looking for'),
			),
		);
		if (isset($errorMessages[$error['code']]))
		{
			$errorMessage = $errorMessages[$error['code']];
		}
		else
		{
			$errorMessage = array(
				'title' => Yii::t('messages', 'System Error'),
				'message' => Yii::t('messages', 'There is something error with our system.'),
			);
		}
		$errorMessage['code'] = $error['code'];
		$this->render('index', $errorMessage);
	}
}

<?php

/**
 * AdministrationModule handles all administrative functionality requires to
 * manage the application. 
 * 
 * @author Petra Barus <petra.barus@gmail.com>
 * @package administration
 */
class AdministrationModule extends CWebModule
{

	/**
	 * Initializes the modules.
	 * 
	 * This method registers required models and components.
	 * This method set theme and defaultController.
	 * This method is called when the module is being created
	 * you may place code here to customize the module or the application
	 * import the module-level models and components
	 */
	public function init()
	{

		$this->configure(array(
			'import' => array(
				'administration.models.*',
				'administration.components.*',
			),
			'defaultController' => 'Dashboard',
		));
		Yii::app()->configure(array(
			'theme' => 'administration',
			'homeUrl'=>array('/administration/dashboard/index'),
			'components' => array(
				'bootstrap' => array(
					'class' => '\\bootstrap\\Component',
					'useLess' => false, //on theming development mode useLess set true
					'responsive' => true,
					'autoRegisterScript' => false,
				),
			),
		));
		//TODO: Check authorization.
		if (true)
		{
			Yii::app()->errorHandler->errorAction = 'administration/error/index';
		}
	}

	/**
	 * The pre-filter for controller actions.
	 * This method is invoked before the currently requested controller action and all its filters
	 * are executed.
	 * 
	 * @param CController $controller the controller
	 * @param CAction $action the action
	 * @return boolean whether the action should be executed.
	 */
	public function beforeControllerAction($controller, $action)
	{
		if (parent::beforeControllerAction($controller, $action))
		{
			return true;
		}
		else
			return false;
	}
}

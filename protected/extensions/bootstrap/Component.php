<?php

namespace bootstrap;

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Bootstrap base component
 *
 * @author Nurcahyo al Hidayah <2light.hidayah@gmail.com>
 */
class Component extends \CApplicationComponent
{
	/**
	 *
	 * @var string alias of twitter-bootstrap vendor file 
	 */
	public $vendorAlias = 'application.extensions.bootstrap.assets';

	/**
	 *
	 * @var string assetUrl 
	 */
	private $_assetUrl;

	/**
	 *
	 * @var boolean Use Less Css if set true
	 */
	public $useLess = false;

	/**
	 *
	 * @var boolean Use responsive css
	 */
	public $responsive = false;

	/**
	 *
	 * @var integer \CClientScript position. example: \CClientScript::POS_END, \CClientScript::POS_BEGIN, etc.
	 */
	public $clientScriptPosition = \CClientScript::POS_END;

	/**
	 * init bootstrap component
	 */
	public function init()
	{
		$this->registerClientScript();
	}

	public function registerClientScript()
	{
		$cs = new \CClientScript;
		$cs = \Yii::app()->getClientScript();
		$cs->registerCoreScript('jquery');
		if ($this->useLess)
		{
			$cs->registerScriptFile("{$this->getAssetUrl()}/js/less-1.3.0.min.js", $this->clientScriptPosition);
			$cs->registerLinkTag('stylesheet/less', 'text/css', $this->getAssetUrl() . "/less/bootstrap.less");
			if ($this->responsive)
			{
				$cs->registerLinkTag('stylesheet/less', 'text/css', $this->getAssetUrl() . "/less/responsive.less");
			}
		}
		else
		{
			$cs->registerCssFile($this->getAssetUrl() . '/css/bootstrap.css');
			if ($this->responsive)
			{
				$cs->registerCssFile($this->getAssetUrl() . '/css/bootstrap-responsive.css');
			}
		}
	}

	/**
	 *
	 * @return string url of twitter-bootstrap vendor 
	 */
	public function getAssetUrl()
	{
		if (is_null($this->_assetUrl))
			$this->setAssetUrl(\Yii::getPathOfAlias($this->vendorAlias));
		return $this->_assetUrl;
	}

	public function setAssetUrl($vendorPath)
	{
//		$asset=new \CAssetManager;
		$asset = \Yii::app()->assetManager;
		$this->_assetUrl = $asset->publish($vendorPath);
	}
}

?>

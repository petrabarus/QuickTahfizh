<?php

//

namespace bootstrap\widgets;

/**
 * All nav components here—tabs, pills, and lists—share the same base markup and styles through the .nav class.
 * @author Nurcahyo al hidayah <2light.hidayah@gmail.com>
 * @version $Id$
 * @package bootstrap 2.1.1
 */
//import zii CMenu widget.
\Yii::import('zii.widgets.CMenu');

class Nav extends \CMenu
{
	/**
	 * navigation generated as tabs.
	 */
	const type_tabs = 'nav-tabs';
	/**
	 * Navigation generated as pills/
	 */
	const type_pills = 'nav-pills';

	/**
	 * Navigation generated as list. 
	 */
	const type_list = 'nav-list';

	/**
	 * Stackable?
	 * @var boolean Stackable navigation? 
	 */
	public $stackable = false;

	/**
	 * navigation type, tabs, pills, or list. pick the const within type_ prefix if you wanna change the type value.
	 * @var string 
	 */
	public $type = self::type_tabs;

	/**
	 *
	 * @var array html Options of navigation
	 */
	public $htmlOptions = array();

	/**
	 * Initializes the menu widget.
	 * This method mainly appendAllHtmlOptions Calls {@link appendHtmlOptions}
	 * This method register javascript {@link registerClientScript}.
	 * This method mainly normalizes the {@link items} property.
	 * If this method is overridden, make sure the parent implementation is invoked.
	 */
	public function init()
	{
		$this->appendAllHtmlOptions();
		$this->registerClientScript();
		return parent::init();
	}

	/**
	 * register boostrap-dropdown.js. 
	 */
	public function registerClientScript()
	{
		\Yii::app()->getClientScript()->registerScriptFile(\Yii::app()->bootstrap->getAssetUrl() . '/js/bootstrap-dropdown.js');
	}

	/**
	 * Calls {@link renderMenu} to render the menu.
	 */
	public function run()
	{
		return parent::run();
	}

	/**
	 * Normalizes the {@link items} property so that the 'active' state is properly identified for every menu item.
	 * @param array $items the items to be normalized.
	 * @param string $route the route of the current request.
	 * @param boolean $active whether there is an active child menu item.
	 * @return array the normalized menu items
	 */
	protected function normalizeItems($items, $route, &$active)
	{
		foreach ($items as $i => $item)
		{
			/**
			 * condition for bootstrap li divider* css class.
			 */
			if ($item == '|' || $item == '-')
			{
				$items[$i] = $item = array('itemOptions' => array('class' => ($item === '|') ? 'divider-vertical' : 'divider'));
			}
			if (isset($item['visible']) && !$item['visible'])
			{
				unset($items[$i]);
				continue;
			}
			if (!isset($item['label']))
				$item['label'] = '';
			if ($this->encodeLabel)
				$items[$i]['label'] = \CHtml::encode($item['label']);
			if (isset($item['icon']))
				$items[$i]['label'] = \CHtml::tag('b', array('class' => "icon-" . $item['icon']), '', true) . $items[$i]['label'];
			$hasActiveChild = false;
			if (isset($item['items']))
			{
				$items[$i]['label'].="\n<b class=\"caret\"></b>";
				$items[$i]['itemOptions']['class'] = isset($item['itemOptions']['class']) ? $item['itemOptions']["class"] . " dropdown" : "dropdown";
				$items[$i]['linkOptions']['class'] = isset($item['linkOptions']['class']) ? $item['linkOptions']["class"] . " dropdown-toggle" : "dropdown-toggle";
				$items[$i]['linkOptions']['data-toggle'] = 'dropdown';
				$items[$i]['items'] = $this->normalizeItems($item['items'], $route, $hasActiveChild);
				if (empty($items[$i]['items']) && $this->hideEmptyItems)
				{
					unset($items[$i]['items']);
					if (!isset($item['url']))
					{
						unset($items[$i]);
						continue;
					}
				}
			}
			if (!isset($item['active']))
			{
				if ($this->activateParents && $hasActiveChild || $this->activateItems && $this->isItemActive($item, $route))
					$active = $items[$i]['active'] = true;
				else
					$items[$i]['active'] = false;
			}
			else if ($item['active'])
				$active = true;
		}
		return array_values($items);
	}

	/**
	 * Renders the content of a menu item.
	 * Note that the container and the sub-menus are not rendered here.
	 * @param array $item the menu item to be rendered. Please see {@link items} on what data might be in the item.
	 * @return string
	 */
	protected function renderMenuItem($item)
	{
		if (isset($item['url']))
		{
			$label = $this->linkLabelWrapper === null ? $item['label'] : \CHtml::tag($this->linkLabelWrapper, $this->linkLabelWrapperHtmlOptions, $item['label']);
			return \CHtml::link($label, $item['url'], isset($item['linkOptions']) ? $item['linkOptions'] : array());
		}
		else if (isset($item['itemOptions']['class']) && substr($item['itemOptions']['class'], 0, 7) === 'divider')
			return $item['label'];
		else
		{
			$item['linkOptions']['class'] = 'nav-header';
			return \CHtml::tag('span', isset($item['linkOptions']) ? $item['linkOptions'] : array(), $item['label']);
		}
	}

	/**
	 * Append All Html Options.
	 * assign htmlOptions,  submenuHtmlOptions to default bootstrap Nav Css HtmlOptions. 
	 */ 
	protected function appendAllHtmlOptions()
	{
		if (isset($this->htmlOptions["class"]))
			$this->htmlOptions["class"].=" nav" . $this->type;
		else
			$this->htmlOptions["class"] = "nav";
		$this->htmlOptions['class'].=" $this->type";
		if (isset($this->submenuHtmlOptions['class']))
			$this->submenuHtmlOptions['class'].=" dropdown-menu";
		else
			$this->submenuHtmlOptions['class'] = "dropdown-menu";
		if ($this->stackable)
			$this->htmlOptions['class'].=' nav-stacked';
	}
}

?>

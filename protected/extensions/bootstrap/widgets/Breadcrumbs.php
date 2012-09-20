<?php

namespace bootstrap\widgets;

/*
 *  Tulis template anda di menu tools template
 *  
 */

/**
 * Breadcrumbs class file.
 *
 * @author Nurcahyo al hidayah <2light.hidayah@gmail.com>
 * @copyright Copyright &copy; 2012-2012 Php Indonesia <Dashboard Jawa Barat>
 * @version $Id$
 */
class Breadcrumbs extends \CWidget
{
	/**
	 * @var string the tag name for the breadcrumbs container tag. Defaults to 'ul'.
	 */
	public $tagName = 'ul';

	/**
	 * @var array the HTML attributes for the breadcrumbs container tag.
	 */
	public $htmlOptions = array('class' => 'breadcrumb');

	/**
	 * @var boolean whether to HTML encode the link labels. Defaults to true.
	 */
	public $encodeLabel = true;

	/**
	 * @var string the first hyperlink in the breadcrumbs (called home link).
	 * If this property is not set, it defaults to a link pointing to {@link CWebApplication::homeUrl} with label 'Home'.
	 * If this property is false, the home link will not be rendered.
	 */
	public $homeLink;

	/**
	 * @var array list of hyperlinks to appear in the breadcrumbs. If this property is empty,
	 * the widget will not render anything. Each key-value pair in the array
	 * will be used to generate a hyperlink by calling CHtml::link(key, value). For this reason, the key
	 * refers to the label of the link while the value can be a string or an array (used to
	 * create a URL). For more details, please refer to {@link CHtml::link}.
	 * If an element's key is an integer, it means the element will be rendered as a label only (meaning the current page).
	 *
	 * The following example will generate breadcrumbs as "Home > Sample post > Edit", where "Home" points to the homepage,
	 * "Sample post" points to the "index.php?r=post/view&id=12" page, and "Edit" is a label. Note that the "Home" link
	 * is specified via {@link homeLink} separately.
	 *
	 * <pre>
	 * array(
	 *     'Sample post'=>array('post/view', 'id'=>12),
	 *     'Edit',
	 * )
	 * </pre>
	 */
	public $links = array();

	/**
	 * @var string String, specifies how each active item is rendered. Defaults to
	 * "<a href="{url}">{label}</a>", where "{label}" will be replaced by the corresponding item
	 * label while "{url}" will be replaced by the URL of the item.
	 * @since 1.1.11
	 */
	public $activeLinkTemplate = '<a href="{url}">{label}</a>';

	/**
	 * @var string String, specifies how each inactive item is rendered. Defaults to
	 * "<span>{label}</span>", where "{label}" will be replaced by the corresponding item label.
	 * Note that inactive template does not have "{url}" parameter.
	 * @since 1.1.11
	 */
	public $inactiveLinkTemplate = '<span>{label}</span>';

	/**
	 * @var string the separator between links in the breadcrumbs. Defaults to ' &raquo; '.
	 */
	public $separator = ' &raquo; ';

	/**
	 * Renders the content of the portlet.
	 */
	public function init()
	{
		
	}

	/**
	 * Renders the content of the portlet.
	 */
	public function run()
	{
		if (empty($this->links))
			return;

		echo \CHtml::openTag($this->tagName, $this->htmlOptions) . "\n";
		$links = array();
		if ($this->homeLink === null)
			$links[] = \CHtml::tag('li',array(),\CHtml::link(\Yii::t('zii', 'Home'), \Yii::app()->homeUrl).\CHtml::tag('span',array('class'=>'divider'),$this->separator));
		else if ($this->homeLink !== false)
			$links[] = $this->homeLink;
		$i=0;
		$count=count($this->links);
		foreach ($this->links as $label => $url)
		{
			++$i;
			if (is_string($label) || is_array($url))
				$links[] = \CHtml::tag('li',array(),$i<$count?strtr($this->activeLinkTemplate, array(
					'{url}' => \CHtml::normalizeUrl($url),
					'{label}' => $this->encodeLabel ? \CHtml::encode($label) : $label,
						)).\CHtml::tag('span',array('class'=>'divider'),$this->separator):strtr($this->activeLinkTemplate, array(
					'{url}' => \CHtml::normalizeUrl($url),
					'{label}' => $this->encodeLabel ? \CHtml::encode($label) : $label,
						))
						);
			else
				$links[] = \CHtml::tag('li',array('class'=>'active'),$i<$count?str_replace('{label}', $this->encodeLabel ? \CHtml::encode($url) : $url, $this->inactiveLinkTemplate).\CHtml::tag('span',array('class'=>'divider'),$this->separator):str_replace('{label}', $this->encodeLabel ? \CHtml::encode($url) : $url, $this->inactiveLinkTemplate));
		}
		echo implode('', $links);
		echo \CHtml::closeTag($this->tagName);
	}
}

?>

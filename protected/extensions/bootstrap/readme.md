Twitter Bootstrap 2.1.1 Extension
Requirement Php 5.3 >

example use for http://twitter.github.com/bootstrap/components.html#navs
<?php
$this->widget('\\bootstrap\\widgets\\Nav', array(
	'stackable' => true,
	'type' => \bootstrap\widgets\Nav::type_list,
	'items' => array(
		array('label' => 'test', 'url' => array('we'), 'icon' => 'glass'),
		array('label' => 'test', 'icon' => 'film'),
		array('label' => 'test', 'url' => array('we'), 'icon' => 'remove', 'items' => array(
				array('label' => 'test dropdown')
		)),
	)
));

?>
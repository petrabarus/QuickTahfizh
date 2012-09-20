<?php
$this->layout = '//layouts/column2';
$this->menu = array(
	array('label' => Yii::t('app','Main')),
	array('label' => Yii::t('app', 'Dashboard'), 'url' => array('/administration/dashboard/index'), 'icon' => 'home'),
	array('label' => Yii::t('app','Account')),
	array('label' => Yii::t('app', 'User'), 'url' => '#', 'icon' => 'user'),
);
$this->breadcrumbs = array(
	Yii::t('app', 'Dashboard'),
);
?>
<h3><?php echo Yii::t('app','Dashboard'); ?></h3>
<p>test</p>
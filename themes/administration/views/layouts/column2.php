<?php /* @var $this Controller */ ?>
<?php $this->beginContent('//layouts/main'); ?>
<!-- left menu starts -->
<div class="span2 main-menu-span">
	<div class="well nav-collapse sidebar-nav">
		<?php
		$this->widget('\\bootstrap\\widgets\\Nav', array(
			'id' => 'leftbar',
			'htmlOptions' => array(
				'class' => 'main-menu'
			),
			'type' => \bootstrap\widgets\Nav::type_tabs,
			'stackable' => true,
			'items' => array(
				array('label' => Yii::t('app', 'Main'), 'itemOptions' => array('class' => 'nav-header hidden-tablet')),
				array('label' => Yii::t('app', 'Dashboard'), 'url' => array('/administration/dashboard/index'), 'icon' => 'home', 'linkOptions' => array('class' => 'ajax-link')),
				array('label' => Yii::t('app', 'User'), 'itemOptions' => array('class' => 'nav-header hidden-tablet')),
				array('label' => Yii::t('app', 'Manage User'), 'url' => array('/administration/users/index'), 'icon' => 'user', 'linkOptions' => array('class' => 'ajax-link')),
			),
		));
		Yii::app()->getClientScript()->registerScript('hidden-tablet', '$("#leftbar li a span").addClass("hidden-tablet")', CClientScript::POS_READY);

		?>
		<label id="for-is-ajax" class="hidden-tablet" for="is-ajax"><input id="is-ajax" type="checkbox"> Ajax on menu</label>
	</div><!--/.well -->
</div><!--/span-->
<!-- left menu ends -->

<noscript>
<div class="alert alert-block span10">
	<h4 class="alert-heading">Warning!</h4>
	<p>You need to have <a href="http://en.wikipedia.org/wiki/JavaScript" target="_blank">JavaScript</a> enabled to use this site.</p>
</div>
</noscript>

<div id="content" class="span10">
	<!-- content starts -->
	<div>
		<?php
		if (isset($this->breadcrumbs)):
			$this->widget('\\bootstrap\\widgets\\Breadcrumbs', array(
				'links' => $this->breadcrumbs
			));

		endif;

		?>
	</div>
	<?php echo $content; ?>
	<!-- content ends -->
</div><!--/#content.span10-->
<?php $this->endContent(); ?>
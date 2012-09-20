<?php /* @var $this Controller */ ?>
<?php $this->beginContent('//layouts/main'); ?>
<div class="row">
	<div class="span3">
		<div id="sidebar" class="well">
			<?php
			$this->widget('\\bootstrap\\widgets\\Nav', array(
				'items' => $this->menu,
				'stackable'=>true,
				'type'=>  \bootstrap\widgets\Nav::type_list,
				'htmlOptions' => array('class' => 'operations'),
			));
			?>
		</div><!-- sidebar -->
	</div>
	<div class="span9">
		<div id="content">
			<?php echo $content; ?>
		</div><!-- content -->
	</div>
</div>
<?php $this->endContent(); ?>
<?php /* @var $this Controller */ ?>
<?php $this->beginContent('//layouts/main'); ?>
<noscript>

<div class="alert alert-block span12"  style="margin-left: 0">
	<h4 class="alert-heading">Warning!</h4>
	<p>You need to have <a href="http://en.wikipedia.org/wiki/JavaScript" target="_blank">JavaScript</a> enabled to use this site.</p>
</div>
</noscript>

<div id="content" class="span12" style="margin-left: 0">
	<!-- content starts -->
	<div>
		<?php
		if (isset($this->breadcrumbs)):
			$this->widget('\\bootstrap\\widgets\\Breadcrumbs', array(
				'links' => $this->breadcrumbs
			));

		endif;

		?>
		<?php echo $content; ?>
	</div>
	<!-- content ends -->
</div><!--/#content.span12-->
<?php $this->endContent(); ?>
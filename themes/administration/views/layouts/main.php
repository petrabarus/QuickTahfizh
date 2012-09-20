<?php /* @var $this Controller */ ?>
<!DOCTYPE html">
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<meta name="language" content="en" />
		<title><?php echo CHtml::encode($this->pageTitle); ?></title>
	</head>

	<body>
		<?php
		$this->widget('\\bootstrap\\widgets\\Navbar', array(
			'type' => \bootstrap\widgets\Navbar::type_inverse,
			'display' => \bootstrap\widgets\Navbar::display_fixed_top,
			'htmlOptions' => array(
				'class' => 'test',
			),
//			'brand'=>false,
			'nav' => array(
				array(
					'items' => array(
						'|',
						array('label' => 'Dashboard', 'url' => array('/administration/dashboard/index')),
						array('label' => 'dropdown example', 'url' => 'javascript:void(0);', 'items' => array(
								array('label' => 'list1', 'url' => 'javascript:void(0);'),
								'-',
								array('label' => 'list2', 'url' => 'javascript:void(0);'),
								'-',
						)),
						'|',
					),
				),
			),
		));

		?>

		<?php if (isset($this->breadcrumbs)): ?>
			<?php
			$this->widget('zii.widgets.CBreadcrumbs', array(
				'links' => $this->breadcrumbs,
			));

			?><!-- breadcrumbs -->
		<?php endif ?>

		<?php echo $content; ?>


		<div id="footer">
			Copyright &copy; <?php echo date('Y'); ?> by My Company.<br/>
			All Rights Reserved.<br/>
			<?php echo Yii::powered(); ?>

		</div><!-- footer -->


	</body>
</html>

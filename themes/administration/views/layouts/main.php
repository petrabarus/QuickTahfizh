<?php /* @var $this Controller */ ?>
<!DOCTYPE html">
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<meta name="language" content="en" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
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
				array(
					'htmlOptions' => array(
						'class' => 'pull-right',
					),
					'items' => array(
						'|',
						array('label' => Yii::app()->name, 'url' => '#', 'icon' => 'user', 'items' => array(
								array('label' => Yii::t('app', 'Profile'), 'url' => array('/account/update')),
								'-',
								array('label' => Yii::t('app', 'Logout'), 'url' => array('/site/logout')),
							)
						)
					)
				)
			),
		));

		?>
		<div class="container">
			<?php echo $content; ?>
			<?php if (isset($this->breadcrumbs)): ?>
				<?php
				$this->widget('\\bootstrap\\widgets\\Breadcrumbs', array(
					'links' => $this->breadcrumbs,
				));
				?><!-- breadcrumbs -->
			<?php endif ?>
			<hr/>
			<footer>
				Copyright &copy; <?php echo date('Y'); ?> by My Company.<br/>
				All Rights Reserved.<br/>
				<?php echo Yii::powered(); ?>
			</footer><!-- footer -->

		</div>
	</body>
</html>

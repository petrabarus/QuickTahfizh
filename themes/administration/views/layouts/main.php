<?php
/* @var $this Controller */
define('ADMIN_THEME', Yii::app()->theme->baseUrl);
define('ADMIN_THEME_CSS', ADMIN_THEME . '/css');
define('ADMIN_THEME_JS', ADMIN_THEME . '/js');
define('ADMIN_THEME_IMAGES', ADMIN_THEME . '/img');

?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<!--
				Charisma v1.0.0

				Copyright 2012 Muhammad Usman
				Licensed under the Apache License v2.0
				http://www.apache.org/licenses/LICENSE-2.0

				http://usman.it
				http://twitter.com/halalit_usman
		-->
		<meta charset="utf-8">
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<meta name="language" content="<?php echo Yii::app()->language; ?>" />
		<title><?php echo CHtml::encode($this->pageTitle); ?></title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta name="description" content="">
		<meta name="author" content="">
		<!-- The styles -->
		<link id="bs-css" href="<?php echo ADMIN_THEME_CSS; ?>/bootstrap-cerulean.css" rel="stylesheet">
		<link href="<?php echo ADMIN_THEME_CSS; ?>/charisma-app.css" rel="stylesheet">
		<link href="<?php echo ADMIN_THEME_CSS; ?>/jquery-ui-1.8.21.custom.css" rel="stylesheet">
		<link href='<?php echo ADMIN_THEME_CSS; ?>/fullcalendar.css' rel='stylesheet'>
		<link href='<?php echo ADMIN_THEME_CSS; ?>/fullcalendar.print.css' rel='stylesheet'  media='print'>
		<link href='<?php echo ADMIN_THEME_CSS; ?>/chosen.css' rel='stylesheet'>
		<link href='<?php echo ADMIN_THEME_CSS; ?>/uniform.default.css' rel='stylesheet'>
		<link href='<?php echo ADMIN_THEME_CSS; ?>/colorbox.css' rel='stylesheet'>
		<link href='<?php echo ADMIN_THEME_CSS; ?>/jquery.cleditor.css' rel='stylesheet'>
		<link href='<?php echo ADMIN_THEME_CSS; ?>/jquery.noty.css' rel='stylesheet'>
		<link href='<?php echo ADMIN_THEME_CSS; ?>/noty_theme_default.css' rel='stylesheet'>
		<link href='<?php echo ADMIN_THEME_CSS; ?>/elfinder.min.css' rel='stylesheet'>
		<link href='<?php echo ADMIN_THEME_CSS; ?>/elfinder.theme.css' rel='stylesheet'>
		<link href='<?php echo ADMIN_THEME_CSS; ?>/jquery.iphone.toggle.css' rel='stylesheet'>
		<link href='<?php echo ADMIN_THEME_CSS; ?>/opa-icons.css' rel='stylesheet'>
		<link href='<?php echo ADMIN_THEME_CSS; ?>/uploadify.css' rel='stylesheet'>

		<!--         The HTML5 shim, for IE6-8 support of HTML5 elements -->
		<!--[if lt IE 9]>
			<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
		<![endif]-->

		<!-- The fav icon -->
		<link rel="shortcut icon" href="<?php echo ADMIN_THEME_IMAGES; ?>/favicon.ico">

	</head>

	<body>
		<?php
		//navigation bar
		$this->widget('\\bootstrap\\widgets\\Navbar', array(
			'display' => \bootstrap\widgets\Navbar::display_fixed_top,
			'collapse' => true,
			'nav' => array(
				array(
					'items' => array(
						array('label' => Yii::t('app', 'Visit site'), 'url' => array('/site/index')),
					)
				),
				'<form class="navbar-search">
             <input placeholder="Search" class="search-query span2" name="query" type="text">
         </form>',
				array(
					'htmlOptions' => array(
						'class' => 'pull-right',
					),
					'items' => array(
						array(
							'label' => Yii::app()->user->name,
							'url' => 'javascript:void(0);;', 'icon' => 'user',
							'items' => array(
								array('label' => Yii::t('app', 'Profile'), 'url' => array('/users/profile')),
								'-',
								array('label' => Yii::t('app', 'Logout'), 'url' => array('/site/logout')),
							)
						),
						array(
							'label' => Yii::t('app', 'Change Theme / Skin'),
							'url' => 'javascript:void(0);;', 'icon' => 'tint',
							'submenuOptions' => array(
								'id' => 'themes',
								'class' => 'dropdown-menu'
							),
							'items' => array(
								array(
									'label' => Yii::t('app', 'Classic'),
									'url' => 'javascript:void(0);;',
									'icon' => 'blank',
									'linkOptions' => array('data-value' => 'classic'),
								),
								array(
									'label' => Yii::t('app', 'Cerulean'),
									'url' => 'javascript:void(0);;',
									'icon' => 'blank',
									'linkOptions' => array('data-value' => 'cerulean'),
								),
								array(
									'label' => Yii::t('app', 'Cyborg'),
									'url' => 'javascript:void(0);;',
									'icon' => 'blank',
									'linkOptions' => array('data-value' => 'cyborg'),
								),
								array(
									'label' => Yii::t('app', 'Redy'),
									'url' => 'javascript:void(0);;',
									'icon' => 'blank',
									'linkOptions' => array('data-value' => 'redy'),
								),
								array(
									'label' => Yii::t('app', 'Journal'),
									'url' => 'javascript:void(0);;',
									'icon' => 'blank',
									'linkOptions' => array('data-value' => 'journal'),
								),
								array(
									'label' => Yii::t('app', 'Simplex'),
									'url' => 'javascript:void(0);;',
									'icon' => 'blank',
									'linkOptions' => array('data-value' => 'simplex'),
								),
								array(
									'label' => Yii::t('app', 'Slate'),
									'url' => 'javascript:void(0);;',
									'icon' => 'blank',
									'linkOptions' => array('data-value' => 'slate'),
								),
								array(
									'label' => Yii::t('app', 'Spacelab'),
									'url' => 'javascript:void(0);;',
									'icon' => 'blank',
									'linkOptions' => array('data-value' => 'spacelab'),
								),
								array(
									'label' => Yii::t('app', 'United'),
									'url' => 'javascript:void(0);;',
									'icon' => 'blank',
									'linkOptions' => array('data-value' => 'united'),
								),
							),
						),
					),
				),
			)
		));
		//end of navigation bar

		?>
		<div class="container-fluid">
			<div class="row-fluid">
				<?php echo $content; ?>
			</div><!--/fluid-row-->

			<hr>


			<footer>
				<p class="pull-left">&copy; <a href="http://www.facebook.com/groups/35688476100" target="_blank">Php Indonesia</a> 2012</p>
				<p class="pull-right"><?php echo Yii::powered(); ?></p>
			</footer>

		</div><!--/.fluid-container-->

		<!-- external javascript
		================================================== -->
		<!-- Placed at the end of the document so the pages load faster -->

		<!-- jQuery UI -->
		<script src="<?php echo ADMIN_THEME_JS; ?>/jquery-ui-1.8.21.custom.min.js"></script>
		<!-- transition / effect library -->
		<script src="<?php echo ADMIN_THEME_JS; ?>/bootstrap-transition.js"></script>
		<!-- alert enhancer library -->
		<script src="<?php echo ADMIN_THEME_JS; ?>/bootstrap-alert.js"></script>
		<!-- modal / dialog library -->
		<script src="<?php echo ADMIN_THEME_JS; ?>/bootstrap-modal.js"></script>
		<!-- scrolspy library -->
		<script src="<?php echo ADMIN_THEME_JS; ?>/bootstrap-scrollspy.js"></script>
		<!-- library for creating tabs -->
		<script src="<?php echo ADMIN_THEME_JS; ?>/bootstrap-tab.js"></script>
		<!-- library for advanced tooltip -->
		<script src="<?php echo ADMIN_THEME_JS; ?>/bootstrap-tooltip.js"></script>
		<!-- popover effect library -->
		<script src="<?php echo ADMIN_THEME_JS; ?>/bootstrap-popover.js"></script>
		<!-- button enhancer library -->
		<script src="<?php echo ADMIN_THEME_JS; ?>/bootstrap-button.js"></script>
		<!-- accordion library (optional, not used in demo) -->
		<script src="<?php echo ADMIN_THEME_JS; ?>/bootstrap-collapse.js"></script>
		<!-- carousel slideshow library (optional, not used in demo) -->
		<script src="<?php echo ADMIN_THEME_JS; ?>/bootstrap-carousel.js"></script>
		<!-- autocomplete library -->
		<script src="<?php echo ADMIN_THEME_JS; ?>/bootstrap-typeahead.js"></script>
		<!-- tour library -->
		<script src="<?php echo ADMIN_THEME_JS; ?>/bootstrap-tour.js"></script>
		<!-- library for cookie management -->
		<script src="<?php echo ADMIN_THEME_JS; ?>/jquery.cookie.js"></script>
		<!-- calander plugin -->
		<script src="<?php echo ADMIN_THEME_JS; ?>/fullcalendar.min.js"></script>
		<!-- data table plugin -->
		<script src="<?php echo ADMIN_THEME_JS; ?>/jquery.dataTables.min.js"></script>

		<!-- chart libraries start -->
		<script src="<?php echo ADMIN_THEME_JS; ?>/excanvas.js"></script>
		<script src="<?php echo ADMIN_THEME_JS; ?>/jquery.flot.min.js"></script>
		<script src="<?php echo ADMIN_THEME_JS; ?>/jquery.flot.pie.min.js"></script>
		<script src="<?php echo ADMIN_THEME_JS; ?>/jquery.flot.stack.js"></script>
		<script src="<?php echo ADMIN_THEME_JS; ?>/jquery.flot.resize.min.js"></script>
		<!-- chart libraries end -->

		<!-- select or dropdown enhancer -->
		<script src="<?php echo ADMIN_THEME_JS; ?>/jquery.chosen.min.js"></script>
		<!-- checkbox, radio, and file input styler -->
		<script src="<?php echo ADMIN_THEME_JS; ?>/jquery.uniform.min.js"></script>
		<!-- plugin for gallery image view -->
		<script src="<?php echo ADMIN_THEME_JS; ?>/jquery.colorbox.min.js"></script>
		<!-- rich text editor library -->
		<script src="<?php echo ADMIN_THEME_JS; ?>/jquery.cleditor.min.js"></script>
		<!-- notification plugin -->
		<script src="<?php echo ADMIN_THEME_JS; ?>/jquery.noty.js"></script>
		<!-- file manager library -->
		<script src="<?php echo ADMIN_THEME_JS; ?>/jquery.elfinder.min.js"></script>
		<!-- star rating plugin -->
		<script src="<?php echo ADMIN_THEME_JS; ?>/jquery.raty.min.js"></script>
		<!-- for iOS style toggle switch -->
		<script src="<?php echo ADMIN_THEME_JS; ?>/jquery.iphone.toggle.js"></script>
		<!-- autogrowing textarea plugin -->
		<script src="<?php echo ADMIN_THEME_JS; ?>/jquery.autogrow-textarea.js"></script>
		<!-- multiple file upload plugin -->
		<script src="<?php echo ADMIN_THEME_JS; ?>/jquery.uploadify-3.1.min.js"></script>
		<!-- history.js for cross-browser state change on ajax -->
		<script src="<?php echo ADMIN_THEME_JS; ?>/jquery.history.js"></script>
		<!-- application script for Charisma demo -->
		<script src="<?php echo ADMIN_THEME_JS; ?>/charisma.js"></script>
	</body>
</html>
<?php
\Yii::app()->getClientScript()->registerScript('baseUrl', 'window.baseUrl="' . Yii::app()->baseUrl . '"', \CClientScript::POS_HEAD)
		->registerCss('navbar_fixed_top-body-padding', '
				@media (min-width: 980px){
					body{padding-top:80px}
				}
				body {
					padding-bottom: 40px;
				}
				.sidebar-nav {
					padding: 9px 0;
				}'
);

?>
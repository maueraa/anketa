<?php /* @var $this Controller */ ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link href="<?php echo Yii::app()->theme->baseUrl; ?>/css/jquery.mobile.theme-1.4.5.css" rel="stylesheet">
	<link href="<?php echo Yii::app()->theme->baseUrl; ?>/css/jquery.mobile.icons-1.4.5.min.css" rel="stylesheet">
	<link href="<?php echo Yii::app()->theme->baseUrl; ?>/css/jquery.mobile.structure-1.4.5.min.css" rel="stylesheet">
	<link href="<?php echo Yii::app()->theme->baseUrl; ?>/css/index.css" rel="stylesheet">
	<link href="<?php echo Yii::app()->request->baseUrl; ?>/favicon.ico" rel="shortcut icon" type="image/x-icon"   />
	<script src="<?php echo Yii::app()->theme->baseUrl; ?>/js/jquery-1.11.1.min.js"></script>
	<script>
		$(document).on("mobileinit", function()
		{
			$.mobile.ajaxEnabled = false;
		});
	</script>
	<script src="<?php echo Yii::app()->theme->baseUrl; ?>/js/jquery.mobile-1.4.5.min.js"></script>
</head>
<body>
<div data-role="page">
	<div data-role="header" data-position="fixed">
		<a data-icon="bars" data-iconpos="notext" href="#Panel1_panel" id="Panel1_button"><?php echo Yii::t('zii','Panel');?></a>
		<h1><?php echo Yii::t('zii',Yii::app()->name);?></h1>
		<a href="#" data-rel="back" data-icon="arrow-l" data-iconpos="notext"><?php echo Yii::t('zii','Back');?></a>
	</div>
	<?php echo $content; ?>
	<div data-role="footer" id="Footer1"><h4><?php
		echo Yii::powered(Yii::app()->footer);
		?></h4></div>
</div>
</body>
</html>
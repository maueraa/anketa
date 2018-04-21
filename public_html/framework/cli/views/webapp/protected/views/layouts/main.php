<?php /* @var $this Controller */ ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="language" content="en" />

	<!-- blueprint CSS framework -->
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/screen.css" media="screen, projection" />
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/langpick.css" media="screen, projection" />
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/print.css" media="print" />
	<!--[if lt IE 8]>
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/ie.css" media="screen, projection" />
	<![endif]-->

	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/main.css" />
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/form.css" />

	<title><?php echo Yii::t('strings',CHtml::encode($this->pageTitle)); ?></title>
</head>

<body>

<div class="container" id="page">

	<div id="header">
		<div id="logo"><?php echo Yii::t('strings',CHtml::encode(Yii::app()->name)); ?></div>
	</div><!-- header -->

	<div id="mainmenu">
		<div class="MyLangPick">
			<?php $this->widget('ext.LanguagePicker.ELangPick', array(
				'linksSeparator'=>'<b style="color: white;"> | </b>',
				'lng'=>array(
					'uz'=>'Кирилл',
					'en'=>'English',
					'lat'=>'Lotin',
					'ru'=>'Русский',
				),
			)
		); ?>
		</div>
		<?php $this->widget('zii.widgets.CMenu',array(
			'items'=>array(
				array('label'=>Yii::t('strings','Home'), 'url'=>array('/site/index')),
				array('label'=>Yii::t('strings','About'), 'url'=>array('/site/page', 'view'=>'about')),
				array('label'=>Yii::t('strings','Contact'), 'url'=>array('/site/contact')),
				array('label'=>Yii::t('strings','Login'), 'url'=>array('/site/login'), 'visible'=>Yii::app()->user->isGuest),
				array('label'=>Yii::t('strings','Mobile'), 'url'=>((substr($_SERVER['HTTP_HOST'],0,4)==='www.')?("http://www.m.".substr($_SERVER['HTTP_HOST'],4)):("http://m.$_SERVER[HTTP_HOST]"))),
				array('label'=>Yii::t('strings','Logout').' ('.Yii::app()->user->name.')', 'url'=>array('/site/logout'), 'visible'=>!Yii::app()->user->isGuest),
			),
		)); ?>
	</div><!-- mainmenu -->
	<?php if(isset($this->breadcrumbs)):?>
		<?php $this->widget('zii.widgets.CBreadcrumbs', array(
			'links'=>$this->breadcrumbs,
		)); ?><!-- breadcrumbs -->
	<?php endif?>

	<?php echo $content; ?>

	<div class="clear"></div>

	<div id="footer">
		<?php echo Yii::powered(); ?>
	</div><!-- footer -->

</div><!-- page -->

</body>
</html>

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
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/forms.css" />

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
		<?php
        $menu =array(
            array('label'=>Yii::t('strings','Бош саҳифа'), 'url'=>array('/site/index')),
            array('label'=>Yii::t('strings','Анкета топширганлар рўйхати'), 'url'=>array('/students/list')),
            array('label'=>Yii::t('strings','Натижалар'), 'url'=>array('/students/results'), 'visible'=>!Yii::app()->user->isGuest),
            array('label'=>Yii::t('strings','Чиқиш'), 'url'=>array('/logout'), 'visible'=>!Yii::app()->user->isGuest),
        );
        //print_r($menu); exit;
        if (isset($this->addmenu) and $this->addmenu!="") $menu[]=$this->addmenu;
        $this->widget('zii.widgets.CMenu',array(
			'items'=>$menu,
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

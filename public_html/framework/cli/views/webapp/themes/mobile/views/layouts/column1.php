<?php /* @var $this Controller */ ?>
<?php $this->beginContent('//layouts/main'); ?>
<div data-role="panel" id="Panel1_panel" data-position="left" data-display="reveal">
	<div class="MyLangPick">
		<?php $this->widget('ext.LanguagePicker.ELangPick', array(
		'pickerType'=>'dropdown',
	)); ?>
	</div>
	<?php
	if (!Yii::app()->user->isGuest)
	{
		?>
		<a data-role="button" href="<?=Yii::app()->createUrl("/site/logout")?>"><?=Yii::t('zii','Exit')?></a>
		<?php
	}
	?>
	<a data-role="button" href="http://<?php echo (substr($_SERVER['HTTP_HOST'],0,2)=='m.')?substr($_SERVER['HTTP_HOST'],2):((substr($_SERVER['HTTP_HOST'],0,6)=='www.m.')?substr($_SERVER['HTTP_HOST'],6):$_SERVER['HTTP_HOST'])?>"><?=Yii::t('zii','Full version')?></a>
</div>
<div class="ui-content" role="main">
	<?php echo $content; ?>
</div>
<?php $this->endContent(); ?>
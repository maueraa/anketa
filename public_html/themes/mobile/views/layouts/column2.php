<?php /* @var $this Controller */ ?>
<?php $this->beginContent('//layouts/main'); ?>
<div data-role="panel" id="Panel1_panel" data-position="left" data-display="reveal">
	<div class="MyLangPick">
		<?php $this->widget('ext.LanguagePicker.ELangPick', array(
		'pickerType'=>'dropdown',
	)); ?>
	</div>
	<?php
	$this->beginWidget('zii.widgets.CPortlet', array(
		'title'=>null,
	));
	$this->widget('zii.widgets.CMenu', array(
		'items'=>$this->menu,
		'htmlOptions'=>array(
			'data-role'=>'listview',
			'id'=>'Panel1',
		),
	));
	$this->endWidget();
	?>
	<?php
	if (!Yii::app()->user->isGuest)
	{
		?>
		<a data-role="button" href="<?=Yii::app()->createUrl("/site/logout")?>"><?=Yii::t('zii','Exit')?></a>
		<?php
	}
	?>
</div>
<div class="ui-content" role="main">
	<?php echo $content; ?>
</div>
<?php $this->endContent(); ?>
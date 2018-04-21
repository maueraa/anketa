<?php
return "<?php
/* @var \$this ".ucfirst($this->cntlr)."Controller */

if (!Yii::app()->user->isGuest){
\$this->menu=array(
	array('label'=>Yii::t('strings','Мақола билан ишлаш'), 'url'=>array('topic/menu','id'=>$params[id])),
);
?>
<div id=submenu>
	<?php \$this->widget('zii.widgets.CMenu',array(
		'items'=>\$this->menu,
		\"htmlOptions\"=>array(
			'class'=>'navbar-nav navbar-right nav',
		),
		'encodeLabel'=>false,
		'submenuHtmlOptions'=>array(
			'class'=>'dropdown-menu',
		),
		'activateParents'=>true,
	)
);
	?>
</div>
<?php
}
if (file_exists(dirname(__FILE__).'/$params[query]'.Yii::app()->getLanguage().'.php'))
	\$this->redirect('/$controller->controller/articles?topic=$params[query]'.Yii::app()->getLanguage());
elseif (file_exists(dirname(__FILE__).'/$params[query]uz.php'))
{
	\$this->redirect('/$controller->controller/articles?topic=$params[query]uz');
}
else
{
?>
<h1><?php echo \$this->id . '/' . \$this->action->id; ?></h1>
<p>
	Ассалому алайкум. Сиз асосий меню хосил қилдингиз. Агар менюнинг таркибида қисм меню бўлса, бу сахифани
	тахрирлашингиз шарт эмас. Агар меню таркибий менюга эга бўлмаса, бу сахифани тахрирлаш учун ҳаволага
	ўтинг!
</p>
<?php
}
?>";
?>
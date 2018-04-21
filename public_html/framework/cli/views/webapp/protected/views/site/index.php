<?php
/* @var $this SiteController */

$this->pageTitle=Yii::app()->name;
?>

<h1><i><?php echo Yii::t('zii','Welcome to {appname}!', array('{appname}'=>"<i>".Yii::t('zii',CHtml::encode(Yii::app()->name))."</i>"));?></h1>

<p><?php echo Yii::t('zii','Congratulations! You have successfully created your Yii application.')?></p>

<p><?php echo Yii::t('zii','You may change the content of this page by modifying the following two files')?>:</p>
<ul>
	<li><?php echo Yii::t('zii','View file: {file}', array('{file}'=> "<code>". __FILE__ . "</code>")); ?></li>
	<li><?php echo Yii::t('zii','Layout file: {file}', array('{file}'=> "<code>" .$this->getLayoutFile('main')."</code>"));?></li>
</ul>

<p><?php
echo Yii::t('zii','For more details on how to further develop this application, please read the {documentation}.',array('{documentation}'=>'<a href="http://www.yiiframework.com/doc/">'.Yii::t('zii','documentation').'</a>'))." ";
echo Yii::t('zii','Feel free to ask in the {forum}, should you have any questions.',array('{forum}'=>'<a href="http://www.yiiframework.com/forum/">'.Yii::t('zii','forum').'</a>'))
?>
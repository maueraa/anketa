<?php
/* @var $this SiteController */

$this->pageTitle=Yii::t('zii',Yii::app()->name) . ' - '.Yii::t('zii','About');
$this->breadcrumbs=array(
	Yii::t('zii','About'),
);
?>
<h1><?php echo Yii::t('zii','About')?></h1>

<p><?php echo Yii::t('zii','This is a "static" page. You may change the content of this page by updating the file {file}.', array(
	'{file}'=>'<code>'.__FILE__.'</code>'
	)
);?>
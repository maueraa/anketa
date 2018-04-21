<?php
/* @var $this SiteController */
/* @var $error array */

$this->pageTitle=Yii::t('strings',Yii::app()->name) . ' - '.Yii::t("strings",'Хато');
$this->breadcrumbs=array(
	Yii::t("strings",'Хатолик'),
);
?>

<h2><?php echo Yii::t("strings",'{code}-кодли хатолик содир бўлди',array("{code}"=>$code)); ?></h2>

<div class="error">
<?php echo CHtml::encode($message); ?>
</div>
<?php
/* @var $this StudentsController */
/* @var $model Students */

$this->menu=array(
	array('label'=>Yii::t('strings','List {label}', array('{label}'=>Yii::t('strings','Students'))), 'url'=>array('index')),
	array('label'=>Yii::t('strings','Manage {label}', array('{label}'=>Yii::t('strings','Students'))), 'url'=>array('admin')),
);
?>

<h1><?php echo Yii::t('strings','Исми-шарифингизни киритинг!');?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>
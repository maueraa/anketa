<?php
/* @var $this StudentsController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	Yii::t('strings','Students'),
);

$this->menu=array(
	array('label'=>Yii::t('strings','Create {label}', array('{label}'=>Yii::t('strings','Students'))), 'url'=>array('create')),
	array('label'=>Yii::t('strings','Manage {label}', array('{label}'=>Yii::t('strings','Students'))), 'url'=>array('admin')),
);
?>

<h1><?php echo Yii::t('strings','Students')?></h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>

<?php
/* @var $this StudentsController */
/* @var $model Students */

$this->breadcrumbs=array(
	Yii::t('strings','Students')=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>Yii::t('strings','List {label}', array('{label}'=>Yii::t('strings','Students'))), 'url'=>array('index')),
	array('label'=>Yii::t('strings','Create {label}', array('{label}'=>Yii::t('strings','Students'))), 'url'=>array('create')),
	array('label'=>Yii::t('strings','Update {label}', array('{label}'=>Yii::t('strings','Students'))), 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>Yii::t('strings','Delete {label}', array('{label}'=>Yii::t('strings','Students'))), 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>Yii::t('strings','Are you sure you want to delete this item?'))),
	array('label'=>Yii::t('strings','Manage {label}', array('{label}'=>Yii::t('strings','Students'))), 'url'=>array('admin')),
);
?>

<h1><?php echo Yii::t('strings','Students') .' - '. Yii::t('strings',$model->id); ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'lname',
		'fname',
		'mname',
		'ar',
		'si',
		'vv',
		'sg',
/**
		array(
			'label'=>$model->getAttributeLabel('sg'),
			'type'=>'raw',
			'value'=>$model->->name,
		),
/**/
	),
)); ?>

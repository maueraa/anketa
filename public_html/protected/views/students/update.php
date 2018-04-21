<?php
/* @var $this StudentsController */
/* @var $model Students */

$this->breadcrumbs=array(
	Yii::t('strings','Students')=>array('index'),
	Yii::t('strings',$model->id)=>array('view','id'=>$model->id),
	Yii::t('strings','Ўзгартириш'),
);

$this->menu=array(
	array('label'=>Yii::t('strings','List {label}', array('{label}'=>Yii::t('strings','Students'))), 'url'=>array('index')),
	array('label'=>Yii::t('strings','Create {label}', array('{label}'=>Yii::t('strings','Students'))), 'url'=>array('create')),
	array('label'=>Yii::t('strings','View {label}', array('{label}'=>Yii::t('strings','Students'))), 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>Yii::t('strings','Manage {label}', array('{label}'=>Yii::t('strings','Students'))), 'url'=>array('admin')),
);
?>

<h1><?php echo Yii::t('strings','Update {table} "{record}" (id={id})', array(
	'{table}'=>Yii::t('strings','Students'),
	'{record}'=>$model->id,
	'{id}'=>$model->id));?></h1>
<?php $this->renderPartial('_form', array('model'=>$model)); ?>
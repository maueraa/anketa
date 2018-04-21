<?php
/* @var $this StudentsController */
/* @var $model Students */

$this->breadcrumbs=array(
	Yii::t('strings','Students')=>array('index'),
	Yii::t('strings','Manage'),
);

$this->menu=array(
	array('label'=>Yii::t('strings','List {label}', array('{label}'=>Yii::t('strings','Students'))), 'url'=>array('index')),
	array('label'=>Yii::t('strings','Create {label}', array('{label}'=>Yii::t('strings','Students'))), 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#students-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1><?php echo Yii::t('strings','Manage {label}', array('{label}'=>Yii::t('strings','Students'))) ?></h1>

<p>
You may optionally enter a comparison operator (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b>
or <b>=</b>) at the beginning of each of your search values to specify how the comparison should be done.
</p>

<?php echo CHtml::link(Yii::t('zii','Advanced Search'),'#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'students-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id',
		'lname',
		'fname',
		'mname',
		'ar',
		'si',
		/*
		'vv',
		'sg',
		//'.name',
		*/
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>

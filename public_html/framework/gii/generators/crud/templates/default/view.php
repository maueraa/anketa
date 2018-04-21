<?php
/**
 * The following variables are available in this template:
 * - $this: the CrudCode object
 */
?>
<?php echo "<?php\n"; ?>
/* @var $this <?php echo $this->getControllerClass(); ?> */
/* @var $model <?php echo $this->getModelClass(); ?> */

<?php
$nameColumn=$this->guessNameColumn($this->tableSchema->columns);
$label=$this->pluralize($this->class2name($this->modelClass));
echo "\$this->breadcrumbs=array(
	Yii::t('strings','$label')=>array('index'),
	\$model->{$nameColumn},
);\n";
?>

$this->menu=array(
	array('label'=>Yii::t('strings','List {label}', array('{label}'=>Yii::t('strings','<?php echo $this->modelClass; ?>'))), 'url'=>array('index')),
	array('label'=>Yii::t('strings','Create {label}', array('{label}'=>Yii::t('strings','<?php echo $this->modelClass; ?>'))), 'url'=>array('create')),
	array('label'=>Yii::t('strings','Update {label}', array('{label}'=>Yii::t('strings','<?php echo $this->modelClass; ?>'))), 'url'=>array('update', 'id'=>$model-><?php echo $this->tableSchema->primaryKey; ?>)),
	array('label'=>Yii::t('strings','Delete {label}', array('{label}'=>Yii::t('strings','<?php echo $this->modelClass; ?>'))), 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model-><?php echo $this->tableSchema->primaryKey; ?>),'confirm'=>Yii::t('strings','Are you sure you want to delete this item?'))),
	array('label'=>Yii::t('strings','Manage {label}', array('{label}'=>Yii::t('strings','<?php echo $this->modelClass; ?>'))), 'url'=>array('admin')),
);
?>

<h1><?php echo "<?php echo Yii::t('strings','$this->modelClass') .' - '. Yii::t('strings',\$model->{$nameColumn}); ?>"; ?></h1>

<?php echo "<?php"; ?> $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
<?php
foreach($this->tableSchema->columns as $column)
	echo "\t\t'".$column->name."',\n";
	echo "/**\n\t\tarray(
			'label'=>\$model->getAttributeLabel('".$column->name."'),
			'type'=>'raw',
			'value'=>\$model->".substr($column->name,0,-3)."->name,\n\t\t),\n/**/\n";
?>
	),
)); ?>

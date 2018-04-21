<?php
/**
 * The following variables are available in this template:
 * - $this: the CrudCode object
 */
?>
<?php echo "<?php\n"; ?>
/* @var $this <?php echo $this->getControllerClass(); ?> */
/* @var $dataProvider CActiveDataProvider */

<?php
$label=$this->pluralize($this->class2name($this->modelClass));
echo "\$this->breadcrumbs=array(
	Yii::t('strings','$label'),
);\n";
?>

$this->menu=array(
	array('label'=>Yii::t('strings','Create {label}', array('{label}'=>Yii::t('strings','<?php echo $this->modelClass; ?>'))), 'url'=>array('create')),
	array('label'=>Yii::t('strings','Manage {label}', array('{label}'=>Yii::t('strings','<?php echo $this->modelClass; ?>'))), 'url'=>array('admin')),
);
?>

<h1><?php echo "<?php echo Yii::t('strings','$label')?>"; ?></h1>

<?php echo "<?php"; ?> $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>

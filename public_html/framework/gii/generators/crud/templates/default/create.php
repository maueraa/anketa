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
$label=$this->pluralize($this->class2name($this->modelClass));
echo "\$this->breadcrumbs=array(
	Yii::t('strings','$label')=>array('index'),
	Yii::t('strings','Create'),
);\n";
?>

$this->menu=array(
	array('label'=>Yii::t('strings','List {label}', array('{label}'=>Yii::t('strings','<?php echo $this->modelClass; ?>'))), 'url'=>array('index')),
	array('label'=>Yii::t('strings','Manage {label}', array('{label}'=>Yii::t('strings','<?php echo $this->modelClass; ?>'))), 'url'=>array('admin')),
);
?>

<h1><?php echo "<?php echo Yii::t('strings','Create {label}', array('{label}'=>Yii::t('strings','$this->modelClass')));?>" ?></h1>

<?php echo "<?php \$this->renderPartial('_form', array('model'=>\$model)); ?>"; ?>

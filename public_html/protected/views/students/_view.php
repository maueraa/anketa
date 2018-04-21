<?php
/* @var $this StudentsController */
/* @var $data Students */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('lname')); ?>:</b>
	<?php echo CHtml::encode($data->lname); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('fname')); ?>:</b>
	<?php echo CHtml::encode($data->fname); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('mname')); ?>:</b>
	<?php echo CHtml::encode($data->mname); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('ar')); ?>:</b>
	<?php echo CHtml::encode($data->ar); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('si')); ?>:</b>
	<?php echo CHtml::encode($data->si); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('vv')); ?>:</b>
	<?php echo CHtml::encode($data->vv); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('sg')); ?>:</b>
	<?php echo CHtml::encode($data->sg); ?>
	<br />

	*/ ?>

</div>
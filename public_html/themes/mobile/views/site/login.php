<?php
/* @var $this SiteController */
/* @var $model LoginForm */
/* @var $form CActiveForm  */

$this->pageTitle=Yii::app()->name . ' - '. Yii::t('zii','Login');
$this->breadcrumbs=array(
	Yii::t('zii','Login'),
);
?>

<h1><?=Yii::t('zii','Login')?></h1>

<p><?php echo Yii::t('zii','Please fill out the following form with your login credentials').":"?></p>

<div class="form">
<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'login-form',
	'enableClientValidation'=>true,
	'clientOptions'=>array(
		'validateOnSubmit'=>true,
	),
)); ?>

	<p class="note"><?=Yii::t('zii','Fields with {require} are required', array('{require}'=>'<span class="required">*</span>'))?>.</p>

	<div class="row">
		<?php echo $form->labelEx($model,'username'); ?>
		<div>
			<?php echo $form->textField($model,'username'); ?>
		</div>
		<?php echo $form->error($model,'username'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'password'); ?>
		<div>
			<?php echo $form->passwordField($model,'password'); ?>
		</div>
		<?php echo $form->error($model,'password'); ?>
	</div>

	<div class="row buttons">
		<div data-role="button">
			<?php echo CHtml::submitButton(Yii::t('zii','Login')); ?>
		</div>
	</div>

<?php $this->endWidget(); ?>
</div><!-- form -->

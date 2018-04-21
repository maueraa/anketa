<?php
/* @var $this SiteController */
/* @var $model LoginForm */
/* @var $form CActiveForm  */

$this->pageTitle=Yii::t('zii',Yii::app()->name) . ' - '. Yii::t('zii','Login');
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
		<?php echo $form->textField($model,'username'); ?>
		<?php echo $form->error($model,'username'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'password'); ?>
		<?php echo $form->passwordField($model,'password'); ?>
		<?php echo $form->error($model,'password'); ?>
		<p class="hint">
			<?php echo Yii::t('zii',"Hint: You may login with {demo} or {admin}.", array('{demo}'=>'<kbd>demo</kbd>/<kbd>demo</kbd>', '{admin}'=>'<kbd>admin</kbd>/<kbd>admin</kbd>'));?>
		</p>
	</div>

	<div class="row rememberMe">
		<?php echo $form->checkBox($model,'rememberMe'); ?>
		<?php echo $form->label($model,'rememberMe'); ?>
		<?php echo $form->error($model,'rememberMe'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton(Yii::t('zii','Login')); ?>
	</div>

<?php $this->endWidget(); ?>
</div><!-- form -->

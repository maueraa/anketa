<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Murodjon
 * Date: 16.02.18
 * Time: 15:26
 * To change this template use File | Settings | File Templates.
 */
?>
<div class="anketa">
<?php
switch ($variant->id)
{
	case 1:
		echo "<div style='text-align: center;'>".Yii::t("strings",$variant->detail2);
		echo "<form action='/students/si/$model->student_id'><input type='submit' value='".Yii::t("strings","Давом этиш")."&gt;'></form></div>";
		break;
	case 2:
		echo "<div style='text-align: center;'>".Yii::t("strings","$variant->test");
		echo "<form action='/students/si/$model->student_id'><input type='submit' value='".Yii::t("strings","Давом этиш")."&gt;'></form></div>";
		break;
	case 3:
		$model = new Comments();
		$form=$this->beginWidget('CActiveForm', array(
			'id'=>'comment-form',
			'enableAjaxValidation'=>false,
		));
		?>
			<div class="row">
				Изохингизни қолдиринг:<br>
				<?php echo $form->textArea($model,'comment',array('rows'=>6, 'cols'=>100)); ?>
				<?php echo $form->error($model,'comment'); ?>
			</div>
			<?php if(CCaptcha::checkRequirements()): ?>
			<div class="row">
				<?php echo $form->labelEx($model,'verifyCode'); ?>
				<div>
					<?php
					$this->createAction("captcha")->getVerifyCode(true);
					$this->widget('CCaptcha', array('showRefreshButton'=>false)); ?><br/>
					<?php echo $form->textField($model,'verifyCode', array('style'=>'width:300px','placeholder'=>'Текшириш кодини киритинг')); ?>
				</div>
				<?php echo $form->error($model,'verifyCode'); ?>
			</div>
			<?php endif; ?>
			<div class="row buttons">
				<?php echo CHtml::submitButton($model->isNewRecord ? Yii::t('strings','Изоҳни юбориш') : Yii::t('strings','Сақлаш')); ?>
			</div>

			<?php
		$this->endWidget();
		$comment = CommentTemporary::model()->findAll('true limit 5');
		echo "<br><hr><div style='font-size: 10pt !important; font-family: Arial;'>";
		echo Yii::t("strings","Қолдирилган ҳабарлар");
		for ($i=0; $i<count($comment); $i++){
			?><div style="border: 1px solid #d3d3d3;font-size: 10pt !important; background-color: #fffadf; font-family: Arial;">
				<dt><?=$comment[$i]->student_id?>
				<dd style="font-style: italic;"><?=$comment[$i]->comment?></dd>
				</dt>
			</div>&nbsp;
			<?php
		}
		echo "</div>";
		break;
	case 4:
		echo "<div style='text-align: center;'>$variant->test";
		echo "<form action='/students/vv/$model->student_id'><input type='submit' value='Давом этиш&gt;'></form></div>";
		break;
	case 5:
		echo "<div style='text-align: center;'>$variant->test";
		echo "<form action='/students/vv/$model->student_id'><input type='submit' value='Давом этиш&gt;'></form></div>";
		break;
	case 6:
		echo "<div style='text-align: center;'>";
		echo "<form action='/students/vv/$model->student_id'><input type='submit' value='Давом этиш&gt;'></form></div>";
		break;
}
?>
</div>
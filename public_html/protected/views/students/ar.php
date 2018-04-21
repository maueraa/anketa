<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Murodjon
 * Date: 16.02.18
 * Time: 15:12
 * To change this template use File | Settings | File Templates.
 */
$varvar = md5(time());
$zarvar = md5($varvar);
$variant = $model[0];
switch ($variant->id){
	case 1:
?>
<div class="anketa">
	<div style="text-align: center; width: 100%;">
		<?=Yii::t("strings",$variant->brief);?>
	</div>
	&nbsp;
	<div>&nbsp;</div>
	<div style="width: 40%; float: left; text-align: center;">
		<form action="/students/reflective" method="get">
			<input type="hidden" name="id" value="<?=$id?>">
			<input type="hidden" name="vt" value="<?=$variant->id?>">
			<input id='m<?=$varvar?>' type="submit" value="<?=Yii::t("strings","Батафсил")?>" onclick="this.disabled=true; m<?=$zarvar?>.disabled=true; return true">
		</form>
	</div>
	<div style="width: 40%; float: right; text-align: center;">
		<form action="/students/active" method="get">
			<input type="hidden" name="id" value="<?=$id?>">
			<input type="hidden" name="vt" value="<?=$variant->id?>">
			<input id='m<?=$zarvar?>' type="submit" value="<?=Yii::t("strings","ТЕСТ")?>" onclick="this.disabled=true; m<?=$varvar?>.disabled=true; return true">
		</form>
	</div>
</div>
<?php
		break;
	case 2:
		?>
		<div class="anketa">
			<div style="text-align: center; width: 100%;">
				<?=$variant->brief;?>
			</div>
			<hr>
			<div style="width: 40%; float: left; text-align: center;">
				<form action="/students/active" method="get">
					<input type="hidden" name="id" value="<?=$id?>">
					<input type="hidden" name="vt" value="<?=$variant->id?>">
					<input id='a<?=$zarvar?>' type="submit" value="Ҳа" onclick="this.disabled=true; a<?=$varvar?>.disabled=true; return true">, яъни<br>
					<?=$variant->detail1?>
				</form>
			</div>
			<div style="width: 40%; float: right; text-align: center;">
				<form action="/students/reflective" method="get">
					<input type="hidden" name="id" value="<?=$id?>">
					<input type="hidden" name="vt" value="<?=$variant->id?>">
					<input id='a<?=$varvar?>' type="submit" value="Йўқ" onclick="this.disabled=true; a<?=$zarvar?>.disabled=true; return true">, демоқчиманки,<br>
					<?=$variant->detail2?>
				</form>
			</div>
		</div>
		<?php
		break;
	case 3:
		?>
		<div class="anketa">
			<div style="text-align: center; width: 100%;">
				<?=$variant->brief;?>
			</div>
			<hr>
			<div style="width: 40%; float: left; text-align: center;">
				<form action="/students/active" method="get">
					<input type="hidden" name="id" value="<?=$id?>">
					<input type="hidden" name="vt" value="<?=$variant->id?>">
					<input type="submit" value="<?=$variant->detail1?>">

				</form>
			</div>
			<div style="width: 40%; float: right; text-align: center;">
				<form action="/students/reflective" method="get">
					<input type="hidden" name="id" value="<?=$id?>">
					<input type="hidden" name="vt" value="<?=$variant->id?>">
					<input type="submit" value="<?=$variant->detail2?>">
				</form>
			</div>
		</div>
		<?php
		break;
}
?>
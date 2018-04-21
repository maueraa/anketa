<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Murodjon
 * Date: 16.02.18
 * Time: 15:12
 * To change this template use File | Settings | File Templates.
 */
$variant = $model[0];
switch ($variant->id){
	case 4:
		?>
		<div class="anketa">
			<div style="text-align: center; width: 100%; color: #000000; font-weight: bold;">
				<?=$variant->brief;?>
			</div><br>&nbsp;
			<div style="width: 40%; float: left; text-align: center;">
				<?=$variant->detail1?>
			</div>
			<div style="width: 40%; float: right; text-align: center;">
				<?=$variant->detail2?>
			</div>
			<div style="clear: both;"></div>
			<div style="width: 40%; float: left; text-align: center;">
				<form action="/students/sensing" method="get">
					<input type="hidden" name="id" value="<?=$id?>">
					<input type="hidden" name="vt" value="<?=$variant->id?>">
					<input type="submit" value="Men shuni tanladim">
				</form>
			</div>

			<div style="width: 40%; float: right; text-align: center;">
				<form action="/students/intuitive" method="get">
					<input type="hidden" name="id" value="<?=$id?>">
					<input type="hidden" name="vt" value="<?=$variant->id?>">
					<input type="submit" value="Men shuni tanladim">
				</form>
			</div>

		</div>
		</div>
		<?php
		break;
	case 5:
		?>
		<div class="anketa">
			<div style="text-align: center; width: 100%; color: #000000; font-weight: bold;">
				<?=$variant->brief;?>
			</div><br>&nbsp;
			<div style="width: 40%; float: left; text-align: center;">
				<?=$variant->detail2?>
			</div>
			<div style="width: 40%; float: right; text-align: center;">
				<?=$variant->detail1?>
			</div>
			<div style="clear: both;"></div>
			<div style="width: 40%; float: left; text-align: center;">
				<form action="/students/intuitive" method="get">
					<input type="hidden" name="id" value="<?=$id?>">
					<input type="hidden" name="vt" value="<?=$variant->id?>">
					<input type="submit" value="Men shunday fikrdaman">
				</form>
			</div>

			<div style="width: 40%; float: right; text-align: center;">
				<form action="/students/sensing" method="get">
					<input type="hidden" name="id" value="<?=$id?>">
					<input type="hidden" name="vt" value="<?=$variant->id?>">
					<input type="submit" value="Men shunday fikrdaman">
				</form>
			</div>

		</div>
		</div>
		<?php
		break;
	case 6:
		?>
		<div class="anketa">
			<div style="text-align: center; width: 100%; color: #000000; font-weight: bold;">
				<?=$variant->brief;?>
			</div><br>&nbsp;
			<div style="width: 40%; float: left; text-align: center;">
				<?=$variant->detail1?>
			</div>
			<div style="width: 40%; float: right; text-align: center;">
				<?=$variant->detail2?>
			</div>
			<div style="clear: both;"></div>
			<div style="width: 40%; float: left; text-align: center;">
				<form action="/students/sensing" method="get">
					<input type="hidden" name="id" value="<?=$id?>">
					<input type="hidden" name="vt" value="<?=$variant->id?>">
					<input type="submit" value="Menga shu qulay">
				</form>
			</div>

			<div style="width: 40%; float: right; text-align: center;">
				<form action="/students/intuitive" method="get">
					<input type="hidden" name="id" value="<?=$id?>">
					<input type="hidden" name="vt" value="<?=$variant->id?>">
					<input type="submit" value="Menga bu yo'l qulay">
				</form>
			</div>
			<div style="clear: both;"></div>
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
					<input type="submit" value="Ҳа">, яъни<br>
					<?=$variant->detail1?>
				</form>
			</div>
			<div style="width: 40%; float: right; text-align: center;">
				<form action="/students/reflective" method="get">
					<input type="hidden" name="id" value="<?=$id?>">
					<input type="hidden" name="vt" value="<?=$variant->id?>">
					<input type="submit" value="Йўқ">, демоқчиманки,<br>
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
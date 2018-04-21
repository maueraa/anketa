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
	case 7:$ns1="45%"; $ns2="45%";
	case 8:$ns1=isset($ns1)?$ns1:"30%"; $ns2=isset($ns2)?$ns2:"60%";;
	case 9:$ns1=isset($ns1)?$ns1:"30%"; $ns2=isset($ns2)?$ns2:"60%";;
	?>
		<div class="anketa">
			<div style="text-align: center; width: 100%; color: #000000; font-weight: bold;">
				<?=$variant->brief;?>
			</div><br>&nbsp;
			<div style="width: <?=$ns1?>; float: left; text-align: center;">
				<?=$variant->detail1?>
			</div>
			<div style="width: <?=$ns2?>; float: right; text-align: center;">
				<?=$variant->detail2?>
			</div>
			<div style="clear: both;"></div>
			<div style="width: 100%; text-align: center;">
				<form action="/students/vvcheck" method="get">
					<input type="hidden" name="id" value="<?=$id?>">
					<input type="hidden" name="vt" value="<?=$variant->id?>">
					<input type="submit" value="TEST">
				</form>
			</div>

			<div style="clear: both;"></div>

		</div>
		</div>
		<?php
		break;
}
?>
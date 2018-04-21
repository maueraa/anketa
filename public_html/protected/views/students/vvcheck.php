<div class="anketa">
	<?php
	switch ($variant->id)
	{
		case 7:
		case 8:
		case 9:
			?>
			<form method="post">
			<?=$variant->test?><br>
				<div style="text-align: center;">
				<input type="submit" value="Tekshirish">
			</div>
			</form>
			<?php
			break;
	}
	?>
</div>
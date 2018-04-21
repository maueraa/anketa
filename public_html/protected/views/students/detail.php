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
		echo "<div style='text-align: center;'>".Yii::t("strings",$variant->detail1);
		echo "<form action='/students/si/$model->student_id'><input type='submit' value='".Yii::t("strings","Давом этиш")."&gt;'></form></div>";
		break;
	case 2:
		echo "<div style='text-align: center;'>".Yii::t("strings","$variant->test");
		echo "<form action='/students/si/$model->student_id'><input type='submit' value='Давом этиш&gt;'></form></div>";
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
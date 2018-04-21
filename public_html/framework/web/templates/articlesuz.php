<?php
return "<?php
/* @var \$this ".ucfirst($this->cntlr)."Controller */

\$warning = include(dirname(__FILE__).'/warning.php');
if (Yii::app()->getLanguage()!=='uz' and Yii::app()->getLanguage()!=='lat')
	echo \"<p class='warning'>\$warning[message]</p>\";

\$this->pageTitle=Yii::app()->name;
\$model = Parts::model()->findAll(\"menu_id=$params[id] order by pos\");
foreach(\$model as \$part){
	switch (\$part->bandtype){
		case 1:
			echo \"<"."hr>\";
			\$this->renderPartial(\"/parts/\$part->bandfile\");
			break;
		case 2:
			echo \"
	<"."hr>
			<"."div class='site-index'>
				<"."div class='body-content'>
					<"."div class='row'>\";
			\$file = (file_exists(YiiBase::app()->basePath.\"/views/parts/\$part->bandfile.php\"))?file_get_contents(YiiBase::app()->basePath.\"/views/parts/\$part->bandfile.php\"):\"\";
			\$band = explode(\"_band_\",\$file);
			foreach(\$band as \$key=>\$val){
				\$bands = explode(\"_content_\",\$val);
				?>
			<div class=\"col-lg-4\">
				<h2><?=isset(\$bands[0])?\$bands[0]:\"\"?></h2>
				<p><?=isset(\$bands[1])?\$bands[1]:\"\";?></p>
				<p><a class=\"btn btn-default\" href=\"<?=isset(\$bands[2])?\$bands[2]:\"#\"?>\" tabindex=\"180\">Detail &raquo;</a></p>
			</div>

			<?php
			}
			echo \"
			</div>
			</div>
			</div>
			\";
			break;
		case 3:
			echo \"<hr>
			<section class='center slider' style='display: block;'>\";
			\$carusel = Carusel::model()->findAll(\"menu_id='$params[id]'\");
			foreach(\$carusel as \$value)
			{
				?><div>
				<img src=\"<?php echo Yii::app()->request->baseUrl; ?>/<?=\$value->imagepath?>\" width=\"300\">
				<p><?php echo \$value->title?></p>
			</div><?php
			}
			echo \"
						</section>
						</div>
						\";
			break;
	}
}
?>";
?>